<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inovasi;
use App\Models\User; 
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class InovasiController extends BaseController
{
    // 1. Tampilan Galeri (Hanya nampilin yang udah Disetujui)
    public function index(Request $request) {
        $cari = $request->query('cari');
        
        $semua_inovasi = Inovasi::where('status', 'disetujui')
            ->when($cari, function ($query, $cari) {
                return $query->where(function($q) use ($cari) {
                    $q->where('nama_tk', 'like', "%{$cari}%")
                      ->orWhere('judul_inovasi', 'like', "%{$cari}%")
                      ->orWhere('npsn', 'like', "%{$cari}%");
                });
            })->latest()->get();

        return view('welcome', compact('semua_inovasi', 'cari'));
    }

    // 2. Tampilan Detail
    public function show($id) {
        $inovasi = Inovasi::findOrFail($id);
        return view('detail', compact('inovasi'));
    }

    // 3. Dashboard Admin (Hanya nampilin karya yang sudah di-ACC)
    public function dashboard() {
        $semua_inovasi = Inovasi::where('status', 'disetujui')->latest()->get();
        return view('admin_dashboard', compact('semua_inovasi'));
    }

    // 4. Form Tambah Inovasi
    public function create() {
        return view('tambah_inovasi');
    }

    // 5. Proses Simpan
    public function store(Request $request) {
        $request->validate([
            'nama_tk' => 'required',
            'npsn' => 'nullable|max:8',
            'nama_guru' => 'required', 
            'judul_inovasi' => 'required',
            'foto' => 'required', 
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:5048', 
        ]);

        $data_foto = [];
        if($request->hasFile('foto')) {
            foreach($request->file('foto') as $file) {
                $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
                $file->move(public_path('uploads'), $nama_file);
                $data_foto[] = $nama_file; 
            }
        }

        Inovasi::create([
            'user_id' => Auth::id(),
            'nama_tk' => $request->nama_tk,
            'npsn' => $request->npsn,
            // BUNGKUS ARRAY JADI JSON BIAR GAK ERROR 500
            'nama_guru' => is_array($request->nama_guru) ? json_encode($request->nama_guru) : $request->nama_guru, 
            'judul_inovasi' => $request->judul_inovasi,
            'deskripsi' => $request->deskripsi,
            // BUNGKUS FOTO JADI JSON
            'foto' => json_encode($data_foto), 
            'link_ppt' => $request->link_ppt,
            'status' => 'menunggu', 
        ]);

        if(Auth::user()->role === 'dinas') {
            return redirect('/admin/dashboard')->with('success', 'Hore! Inovasi dan data Guru sudah tersimpan! ✨');
        } else {
            return redirect('/tk/dashboard')->with('success', 'Karya berhasil dikirim! Menunggu verifikasi Dinas Pendidikan. ⏳');
        }
    }

    // 6. Form Edit
    public function edit($id) {
        $inovasi = Inovasi::findOrFail($id);
        return view('admin_edit', compact('inovasi'));
    }

    // 7. Proses Update
    public function update(Request $request, $id) {
        $inovasi = Inovasi::findOrFail($id);
        
        $request->validate([
            'nama_tk' => 'required',
            'npsn' => 'nullable|max:8',
            'judul_inovasi' => 'required',
        ]);

        $data = [
            'nama_tk' => $request->nama_tk,
            'npsn' => $request->npsn,
            // BUNGKUS NAMA GURU JADI JSON
            'nama_guru' => is_array($request->nama_guru) ? json_encode($request->nama_guru) : $request->nama_guru,
            'judul_inovasi' => $request->judul_inovasi,
            'deskripsi' => $request->deskripsi,
            'link_ppt' => $request->link_ppt,
            'status' => 'menunggu', // <-- Balik ke antrean verifikasi
        ];

        if($request->hasFile('foto')) {
            // Hapus foto lama dengan aman
            $foto_lama = is_string($inovasi->foto) ? json_decode($inovasi->foto, true) : $inovasi->foto;
            
            if (is_array($foto_lama)) {
                foreach ($foto_lama as $f) {
                    if (File::exists(public_path('uploads/' . $f))) {
                        File::delete(public_path('uploads/' . $f));
                    }
                }
            } elseif (is_string($foto_lama) && $foto_lama != '') {
                if (File::exists(public_path('uploads/' . $foto_lama))) {
                    File::delete(public_path('uploads/' . $foto_lama));
                }
            }
            
            // Upload foto baru
            $data_foto = [];
            foreach($request->file('foto') as $file) {
                $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
                $file->move(public_path('uploads'), $nama_file);
                $data_foto[] = $nama_file;
            }
            // BUNGKUS FOTO JADI JSON
            $data['foto'] = json_encode($data_foto);
        }

        $inovasi->update($data);

        if(Auth::user()->role === 'dinas') {
            return redirect('/admin/dashboard')->with('success', 'Data Guru dan Inovasi berhasil diperbarui! ✏️');
        } else {
            return redirect('/tk/dashboard')->with('success', 'Karya berhasil diperbarui dan sedang Menunggu Verifikasi ulang! ⏳');
        }
    }

    // 8. Proses Hapus
    public function destroy($id) {
        $inovasi = Inovasi::findOrFail($id);
        
        $foto_lama = is_string($inovasi->foto) ? json_decode($inovasi->foto, true) : $inovasi->foto;
        if (is_array($foto_lama)) {
            foreach ($foto_lama as $nama_file) {
                $path = public_path('uploads/' . $nama_file);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } elseif (is_string($foto_lama) && $foto_lama != '') {
            $path = public_path('uploads/' . $foto_lama);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $inovasi->delete();
        return back()->with('success', 'Data terhapus bersih! 🧹');
    }

    // 9. Fungsi nampilin halaman ganti password
    public function editPassword() {
        return view('admin_password');
    }

    // 10. Fungsi memproses ganti password
    public function updatePassword(Request $request) {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed', 
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama kamu salah ! ❌');
        }

        $user->update([
            'password' => Hash::make($request->password_baru)
        ]);

        $url = Auth::user()->role === 'dinas' ? '/admin/dashboard' : '/tk/dashboard';
        return redirect($url)->with('success', 'Password berhasil diubah! 🔒✨');
    }

    // 11. Fungsi untuk menampilkan halaman khusus verifikasi karya
    public function halamanVerifikasi()
    {
        $inovasi_pending = Inovasi::whereNull('status')->orWhere('status', 'menunggu')->latest()->get();
        return view('admin_verifikasi', compact('inovasi_pending'));
    }

    // 12. Fungsi khusus untuk menampilkan Dashboard TK
    public function dashboardTk()
    {
        $inovasi_tk = Inovasi::where('nama_tk', Auth::user()->name)->latest()->get();
        return view('tk_dashboard', compact('inovasi_tk'));
    }
    
    // 13. Proses Verifikasi (ACC / Tolak) Karya Inovasi
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak'
        ]);

        $inovasi = Inovasi::findOrFail($id);
        $inovasi->update([
            'status' => $request->status
        ]);

        $pesan = $request->status == 'disetujui' 
                 ? 'Mantap! Karya Inovasi berhasil di-ACC! ✅' 
                 : 'Karya Inovasi dikembalikan / ditolak! ❌';

        return back()->with('success', $pesan);
    }
}
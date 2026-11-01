<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Nampilin Halaman Login
    public function index()
    {
        return view('login');
    }

    // 2. Proses Cek Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // PINTU GERBANG PENENTU ARAH (DINAS vs TK)
            if (Auth::user()->role === 'dinas') {
                // Kalau yang login Dinas, lempar ke Dashboard Dinas
                return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang Admin Dinas! 👋');
            } else {
                // Kalau yang login TK, lempar ke Dashboard TK
                return redirect()->intended('/tk/dashboard')->with('success', 'Selamat datang di Dashboard Sekolah! 🏫');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah!',
        ])->onlyInput('username');
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login-admin')->with('success', 'Berhasil keluar dari sistem!');
    }

    // 4. Nampilin Form Tambah Akun Sekolah (Khusus Dinas)
    public function createSekolah()
    {
        return view('admin_tambah_sekolah');
    }

    // 5. Simpan Akun Sekolah Baru (Khusus Dinas) - DENGAN VALIDASI NPSN & NAMA TIDAK BOLEH SAMA
    public function storeSekolah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'npsn' => 'required|numeric|unique:users,npsn',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama Sekolah / TK wajib diisi.',
            'name.unique' => 'Nama Sekolah / TK ini sudah terdaftar di sistem!',
            'npsn.required' => 'NPSN wajib diisi.',
            'npsn.numeric' => 'NPSN harus berupa angka saja, tidak boleh mengandung huruf!',
            'npsn.unique' => 'Nomor NPSN ini sudah terdaftar untuk sekolah lain!',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        User::create([
            'name' => $request->name,
            'npsn' => $request->npsn,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'tk', // <-- Otomatis jadi 'tk'
        ]);

        return redirect('/admin/daftar-sekolah')->with('success', 'Akun Sekolah TK berhasil ditambahkan!');
    }

    // 6. Nampilin Daftar Sekolah (Khusus Dinas)
    public function daftarSekolah()
    {
        // Ambil data user yang jabatannya (role) adalah 'tk'
        $data_sekolah = User::where('role', 'tk')->orderBy('name', 'asc')->get();
        return view('admin_daftar_sekolah', compact('data_sekolah'));
    }

    // 7. Nampilin Halaman Profil TK
    public function profilTK()
    {
        $user = Auth::user();
        return view('tk_profil', compact('user'));
    }

    // 8. Proses Simpan / Update Profil TK
    public function updateProfilTK(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string',
            'nama_kepsek' => 'nullable|string',
            'no_telp' => 'nullable|string',
            'foto_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::find(Auth::id());
        $user->alamat = $request->alamat;
        $user->nama_kepsek = $request->nama_kepsek;
        $user->no_telp = $request->no_telp;

        // Proses Upload Foto Profil Gedung TK
        if ($request->hasFile('foto_sekolah')) {
            $file = $request->file('foto_sekolah');
            $nama_file = time() . "_profil_" . $file->getClientOriginalName();
            // Simpan ke folder public/uploads/profil
            $file->move(public_path('uploads/profil'), $nama_file);
            $user->foto_sekolah = $nama_file;
        }

        $user->save();

        return back()->with('success', 'Profil Sekolah berhasil diperbarui! 🎉');
    }

    // 9. Nampilin Detail Profil & Karya TK (Khusus Admin)
    public function detailSekolah($id)
    {
        // Cari data akun TK berdasarkan ID
        $sekolah = User::findOrFail($id);
        
        // Cari semua karya inovasi yang nama TK-nya sama dengan akun ini
        $karya_tk = \App\Models\Inovasi::where('nama_tk', $sekolah->name)->orderBy('created_at', 'desc')->get();
        
        return view('admin_detail_sekolah', compact('sekolah', 'karya_tk'));
    }
}
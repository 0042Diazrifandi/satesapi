<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inovasi extends Model
{
    use HasFactory;

    // 1. Kasih tahu Laravel kalau nama tabelnya 'inovasi' (tanpa s)
    protected $table = 'inovasi';

    // 2. Kolom apa aja yang boleh diisi (termasuk user_id dan status)
    protected $fillable = [
        'user_id',
        'nama_tk',
        'npsn',
        'nama_guru',
        'judul_inovasi',
        'deskripsi',
        'foto',
        'link_ppt',
        'status'
    ];

    // 3. Ubah otomatis data JSON di database menjadi Array di kodingan
    protected $casts = [
        'nama_guru' => 'array',
        'foto' => 'array',
    ];

    // 4. Relasi: Karya ini milik user siapa?
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambah kolom profil baru khusus untuk data TK
            $table->text('alamat')->nullable();
            $table->string('nama_kepsek')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('foto_sekolah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom jika database di-rollback (dikembalikan)
            $table->dropColumn(['alamat', 'nama_kepsek', 'no_telp', 'foto_sekolah']);
        });
    }
};
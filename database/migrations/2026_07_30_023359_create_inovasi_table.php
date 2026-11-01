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
        Schema::create('inovasi', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            
            // Data Karya
            $table->string('nama_tk');
            $table->string('npsn')->nullable(); 
            $table->json('nama_guru'); 
            $table->string('judul_inovasi');
            $table->text('deskripsi')->nullable();
            $table->json('foto'); 
            $table->string('link_ppt')->nullable();
            
            // Status Verifikasi Dinas
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovasi');
    }
};
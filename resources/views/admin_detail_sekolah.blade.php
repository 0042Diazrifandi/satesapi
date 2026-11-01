<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Portofolio TK - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #f8fafc; min-height: 100vh; padding-bottom: 70px; }
        
        /* Header Mewah */
        .bg-header { 
            background: linear-gradient(135deg, #7c3aed 0%, #4c1d95 100%); 
            padding: 80px 0 130px 0; 
            border-bottom-left-radius: 60px; 
            border-bottom-right-radius: 60px; 
            position: relative;
            box-shadow: 0 10px 30px rgba(76, 29, 149, 0.2);
        }
        
        .btn-kembali { 
            background: rgba(255, 255, 255, 0.2); 
            color: white; 
            font-weight: 700; 
            border-radius: 50px; 
            padding: 10px 25px; 
            text-decoration: none; 
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s; 
        }
        .btn-kembali:hover { background: white; color: #581c87; transform: translateX(-5px); }

        /* Profile Box Utama */
        .profile-box { 
            background: white; 
            border-radius: 40px; 
            padding: 45px; 
            box-shadow: 0 25px 50px rgba(88, 28, 135, 0.08); 
            margin-top: -80px; 
            position: relative;
            z-index: 10;
        }
        .foto-sekolah { 
            width: 140px; height: 140px; 
            border-radius: 35px; 
            object-fit: cover; 
            border: 6px solid #f8fafc; 
            box-shadow: 0 15px 35px rgba(124, 58, 237, 0.2); 
            background: #fff; 
        }

        /* Card Info Kecil-Kecil */
        .info-card {
            background: #f8fafc;
            border: 1px solid #ede9fe;
            border-radius: 25px;
            padding: 15px 20px;
            height: 100%;
            transition: 0.3s;
        }
        .info-card:hover { background: #f5f3ff; border-color: #c4b5fd; transform: translateY(-5px); box-shadow: 0 10px 20px rgba(139, 92, 246, 0.1); }
        .icon-bulat { width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }

        /* Kartu Karya Inovasi */
        .card-karya { 
            border: none; border-radius: 30px; 
            box-shadow: 0 15px 35px rgba(88,28,135,0.05); 
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
            background: white;
            position: relative;
        }
        .card-karya:hover { transform: translateY(-12px); box-shadow: 0 25px 45px rgba(88,28,135,0.12); }
        
        .img-karya { width: 100%; height: 220px; object-fit: cover; border-top-left-radius: 30px; border-top-right-radius: 30px; }
        
        /* Badge Status Mengambang */
        .badge-status {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 800;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            backdrop-filter: blur(5px);
            z-index: 2;
        }

        @media (max-width: 768px) {
            .bg-header { padding: 50px 0 100px 0; border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; }
            .profile-box { padding: 30px; border-radius: 30px; margin-top: -60px; text-align: center; }
            .foto-sekolah { width: 110px; height: 110px; margin: 0 auto 20px auto !important; }
            .info-card { text-align: left; }
        }
    </style>
</head>
<body>

    <!-- Header Ungu Elegan -->
    <div class="bg-header position-relative">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/admin/daftar-sekolah" class="btn-kembali">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
            <h4 class="text-white fw-extrabold mb-0" style="letter-spacing: 1px;">E-Portfolio TK</h4>
            <div style="width: 105px;"></div>
        </div>
    </div>

    <div class="container animate__animated animate__fadeInUp">
        <!-- Box Profil TK Mewah -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="profile-box d-flex flex-column flex-md-row align-items-center gap-4">
                    @if($sekolah->foto_sekolah)
                        <img src="{{ asset('uploads/profil/' . $sekolah->foto_sekolah) }}" class="foto-sekolah mb-3 mb-md-0">
                    @else
                        <div class="foto-sekolah d-flex align-items-center justify-content-center text-muted mb-3 mb-md-0">
                            <i class="fas fa-school fa-3x opacity-50"></i>
                        </div>
                    @endif
                    
                    <div class="flex-grow-1 w-100">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                            <div>
                                <h2 class="fw-extrabold text-dark mb-1">{{ $sekolah->name }}</h2>
                                <span class="badge bg-light text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill shadow-sm">
                                    <i class="fas fa-id-card me-1"></i> NPSN: <span class="fw-bold">{{ $sekolah->npsn ?? 'Belum ada' }}</span>
                                </span>
                            </div>
                        </div>
                        
                        <!-- Info Card Grid -->
                        <div class="row g-3 mt-1">
                            <div class="col-md-4">
                                <div class="info-card d-flex align-items-center gap-3">
                                    <div class="icon-bulat bg-success bg-opacity-10 text-success"><i class="fas fa-user-tie"></i></div>
                                    <div>
                                        <small class="text-muted fw-bold d-block">Kepala Sekolah</small>
                                        <span class="text-dark fw-bold">{{ $sekolah->nama_kepsek ?? 'Belum diisi' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card d-flex align-items-center gap-3">
                                    <div class="icon-bulat bg-warning bg-opacity-10 text-warning"><i class="fas fa-phone-alt"></i></div>
                                    <div>
                                        <small class="text-muted fw-bold d-block">Kontak / WA</small>
                                        <span class="text-dark fw-bold">{{ $sekolah->no_telp ?? 'Belum diisi' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card d-flex align-items-center gap-3">
                                    <div class="icon-bulat bg-danger bg-opacity-10 text-danger"><i class="fas fa-map-marker-alt"></i></div>
                                    <div>
                                        <small class="text-muted fw-bold d-block">Alamat Lengkap</small>
                                        <span class="text-dark fw-bold small">{{ Str::limit($sekolah->alamat ?? 'Belum dilengkapi', 30) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Karya / Inovasi TK -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-extrabold text-dark m-0"><i class="fas fa-rocket text-primary me-2"></i> Galeri Inovasi Sekolah</h4>
                    <span class="badge px-4 py-2 rounded-pill fs-6 shadow-sm" style="background-color: #f3e8ff; color: #7c3aed;">
                        Total: <b>{{ $karya_tk->count() }} Karya</b>
                    </span>
                </div>

                <div class="row g-4">
                    @forelse($karya_tk as $karya)
                        <div class="col-md-4">
                            <div class="card card-karya h-100">
                                
                                <!-- Badge Mengambang -->
                                @if($karya->status == 'disetujui')
                                    <span class="badge-status bg-success text-white"><i class="fas fa-check-circle me-1"></i> Disetujui</span>
                                @elseif($karya->status == 'ditolak')
                                    <span class="badge-status bg-danger text-white"><i class="fas fa-times-circle me-1"></i> Ditolak</span>
                                @else
                                    <span class="badge-status bg-warning text-dark"><i class="fas fa-clock me-1"></i> Pending</span>
                                @endif

                                @php
                                    $foto_tampil = is_array($karya->foto) ? ($karya->foto[0] ?? null) : $karya->foto;
                                @endphp
                                
                                @if($foto_tampil)
                                    <img src="{{ asset('uploads/' . $foto_tampil) }}" class="img-karya">
                                @else
                                    <div class="img-karya bg-light d-flex align-items-center justify-content-center border-bottom">
                                        <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                                    </div>
                                @endif
                                
                                <div class="card-body p-4">
                                    <h5 class="fw-bold text-dark mb-2 line-clamp-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $karya->judul_inovasi }}
                                    </h5>
                                    <p class="text-muted small mb-0" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $karya->deskripsi }}
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 px-4 pb-4 pt-0 text-center mt-auto">
                                    <a href="/galeri/{{ $karya->id }}" class="btn btn-primary w-100 rounded-pill fw-bold" target="_blank" style="background: #8b5cf6; border: none; padding: 10px 0;">
                                        Lihat Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="p-5 bg-white rounded-4 shadow-sm">
                                <i class="fas fa-box-open fa-4x text-muted mb-4 opacity-25"></i>
                                <h4 class="fw-bold text-dark">Belum Ada Portofolio</h4>
                                <p class="text-muted mb-0">Sekolah TK ini belum mempublikasikan karya inovasi satupun.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #f7f5fa; min-height: 100vh; overflow-x: hidden; }
        .sidebar { background: linear-gradient(180deg, #581c87 0%, #7c3aed 100%); min-height: 100vh; color: white; padding: 30px 20px; border-top-right-radius: 40px; border-bottom-right-radius: 40px; position: fixed; width: inherit; z-index: 1000; }
        .nav-link-admin { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 15px; margin-bottom: 10px; transition: all 0.3s; text-decoration: none; display: block; font-weight: 700; }
        .nav-link-admin:hover, .nav-link-admin.active { background: white; color: #6d28d9; transform: translateX(10px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .main-content { margin-left: 16.666667%; padding: 40px; }
        
        .form-container { background: white; border-radius: 30px; padding: 40px; box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05); }
        .input-group-text { background-color: #f8fafc; border: 2px solid #ede9fe; border-right: none; border-radius: 15px 0 0 15px; color: #a855f7; }
        .form-control { border-radius: 0 15px 15px 0; padding: 12px 20px; border: 2px solid #ede9fe; border-left: none; background-color: #f8fafc; font-weight: 600; color: #475569; }
        .form-control:focus { border-color: #8b5cf6; background-color: white; box-shadow: none; }
        .form-control:focus + .input-group-text { border-color: #8b5cf6; background-color: white; }
        textarea.form-control { border-radius: 15px !important; border-left: 2px solid #ede9fe !important; padding-left: 20px !important; }
        
        .foto-preview { width: 150px; height: 150px; object-fit: cover; border-radius: 20px; border: 4px solid #ede9fe; margin-bottom: 15px; box-shadow: 0 10px 20px rgba(139,92,246,0.15); }
        .btn-submit { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white; border-radius: 50px; font-weight: 800; border: none; padding: 12px 30px; box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3); transition: 0.3s; width: 100%; }
        .btn-submit:hover { transform: translateY(-3px); color: white; box-shadow: 0 8px 20px rgba(124, 58, 237, 0.4); }

        @media (max-width: 768px) {
            .sidebar { position: fixed; bottom: 0; left: 0; top: auto; width: 100%; min-height: auto; border-radius: 25px 25px 0 0; padding: 15px 10px; display: flex; flex-direction: row; justify-content: space-around; }
            .sidebar-header, .sidebar hr { display: none; }
            .sidebar nav { display: flex; width: 100%; justify-content: space-around; margin: 0; }
            .nav-link-admin { padding: 8px; margin-bottom: 0; font-size: 0.7rem; display: flex; flex-direction: column; align-items: center; gap: 5px; }
            .nav-link-admin i { margin: 0 !important; font-size: 1.3rem; }
            .nav-link-admin span { display: block; }
            .main-content { margin-left: 0; padding: 20px 15px 100px 15px; }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 p-0">
            <div class="sidebar shadow-lg">
                <div class="text-center mb-5 sidebar-header">
                    <h3 class="fw-extrabold text-white">SATE SAPI</h3>
                    <small class="opacity-75">Panel Sekolah TK</small>
                </div>
                <nav>
                    <a href="/tk/dashboard" class="nav-link-admin">
                        <i class="fas fa-th-large me-2"></i> <span>Dashboard</span>
                    </a>
                    <a href="/tambah-inovasi" class="nav-link-admin">
                        <i class="fas fa-rocket me-2"></i> <span>Kirim Karya</span>
                    </a>
                    <!-- Menu Profil Baru -->
                    <a href="/tk/profil" class="nav-link-admin active">
                        <i class="fas fa-id-badge me-2"></i> <span>Profil TK</span>
                    </a>
                    <a href="/admin/password" class="nav-link-admin">
                        <i class="fas fa-lock me-2"></i> <span>Password</span>
                    </a>
                    <hr class="text-white opacity-25">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link-admin text-warning bg-transparent border-0 w-100 text-start">
                            <i class="fas fa-sign-out-alt me-2"></i> <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 main-content">
            <div class="row mb-4 animate__animated animate__fadeInDown">
                <div class="col-12">
                    <h2 class="fw-bold text-dark">Profil Sekolah 🏫</h2>
                    <p class="text-muted">Lengkapi data profil untuk ditampilkan di galeri publik.</p>
                </div>
            </div>

            <div class="form-container animate__animated animate__fadeInUp">
                @if(session('success'))
                    <div class="alert alert-success rounded-4 mb-4 border-0" style="background-color: #dcfce7; color: #166534;">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="/tk/profil" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Kolom Foto (Kiri) -->
                        <div class="col-md-4 text-center mb-4">
                            @if($user->foto_sekolah)
                                <img src="{{ asset('uploads/profil/' . $user->foto_sekolah) }}" class="foto-preview">
                            @else
                                <div class="foto-preview bg-light d-flex align-items-center justify-content-center mx-auto text-muted">
                                    <i class="fas fa-school fa-3x opacity-25"></i>
                                </div>
                            @endif
                            
                            <label class="form-label fw-bold mt-2">Update Foto Sekolah</label>
                            <input type="file" name="foto_sekolah" accept="image/*" class="form-control form-control-sm" style="border-radius: 10px; border-left: 2px solid #ede9fe;">
                        </div>

                        <!-- Kolom Data (Kanan) -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Sekolah</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                                    <input type="text" value="{{ $user->name }}" class="form-control bg-light" readonly>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor NPSN</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="text" value="{{ $user->npsn }}" class="form-control bg-light" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Kepala Sekolah</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                    <input type="text" name="nama_kepsek" value="{{ old('nama_kepsek', $user->nama_kepsek) }}" class="form-control" placeholder="Contoh: Budi Santoso, S.Pd">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor Telepon / WhatsApp</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    <input type="text" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" class="form-control" placeholder="Contoh: 08123456789">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Alamat Lengkap Sekolah</label>
                                <textarea name="alamat" rows="3" class="form-control shadow-sm" placeholder="Contoh: Jl. Merdeka No. 10, Kec. Ungaran Barat, Kab. Semarang">{{ old('alamat', $user->alamat) }}</textarea>
                            </div>

                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save me-2"></i> Simpan Profil Sekolah
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
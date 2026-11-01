<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun Sekolah - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f5fa;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Desktop */
        .sidebar {
            background: linear-gradient(180deg, #581c87 0%, #7c3aed 100%);
            min-height: 100vh;
            color: white;
            padding: 30px 20px;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            position: fixed;
            width: inherit;
            z-index: 1000;
        }

        .nav-link-admin {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            border-radius: 15px;
            margin-bottom: 10px;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
            font-weight: 700;
        }

        .nav-link-admin:hover, .nav-link-admin.active {
            background: white;
            color: #6d28d9;
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .main-content {
            margin-left: 16.666667%;
            padding: 40px;
        }

        /* Form Container */
        .form-container {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05);
            max-width: 600px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 20px;
            border: 2px solid #ede9fe;
            background-color: #f8fafc;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.15);
            background-color: white;
        }

        .form-label {
            font-weight: 700;
            color: #475569;
            margin-bottom: 8px;
        }

        .btn-submit {
            background: #8b5cf6;
            color: white;
            border-radius: 50px;
            font-weight: 800;
            border: none;
            padding: 12px 30px;
            box-shadow: 0 4px 0 #6d28d9;
            transition: 0.3s;
            width: 100%;
        }
        .btn-submit:hover { background: #7c3aed; color: white; transform: translateY(2px); box-shadow: 0 2px 0 #6d28d9; }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                bottom: 0; left: 0; top: auto;
                width: 100%;
                min-height: auto;
                border-radius: 25px 25px 0 0;
                padding: 15px 10px;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                box-shadow: 0 -5px 20px rgba(88, 28, 135, 0.15);
            }
            .sidebar-header, .sidebar hr { display: none; }
            .sidebar nav { display: flex; width: 100%; justify-content: space-around; margin: 0; }
            .nav-link-admin { padding: 8px; margin-bottom: 0; font-size: 0.7rem; display: flex; flex-direction: column; align-items: center; gap: 5px; }
            .nav-link-admin:hover, .nav-link-admin.active { transform: translateY(-5px); }
            .nav-link-admin i { margin: 0 !important; font-size: 1.3rem; }
            .nav-link-admin span { display: block; }
            .main-content { margin-left: 0; padding: 20px 15px 100px 15px; }
            .welcome-text h2 { font-size: 1.6rem; }
            .form-container { padding: 25px; border-radius: 20px; }
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
                    <small class="opacity-75">Admin Panel v2.0</small>
                </div>
                <nav>
                    <a href="/admin/dashboard" class="nav-link-admin">
                        <i class="fas fa-th-large me-2"></i> <span>Dashboard</span>
                    </a>

                    <!-- MENU KHUSUS ADMIN DINAS -->
                    @if(Auth::user()->role === 'dinas')
                        <!-- Menu Tambah Sekolah Sedang Aktif di sini -->
                             <a href="/admin/daftar-sekolah" class="nav-link-admin">
                            <i class="fas fa-list me-2"></i> <span>Data Sekolah</span>
                        <a href="/admin/tambah-sekolah" class="nav-link-admin active">
                            <i class="fas fa-school me-2"></i> <span>Add Sekolah</span>
                        </a>
                        <a href="/admin/verifikasi-karya" class="nav-link-admin">
                            <i class="fas fa-check-double me-2"></i> <span>Verif Karya</span>
                        </a>
                    @endif

                    <a href="/admin/password" class="nav-link-admin">
                        <i class="fas fa-lock me-2"></i> <span>Password</span>
                    </a>
                    <a href="/galeri" class="nav-link-admin">
                        <i class="fas fa-eye me-2"></i> <span>Galeri</span>
                    </a>
                    <hr class="text-white opacity-25">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link-admin text-warning bg-transparent border-0 w-100 text-start" onclick="return confirm('Yakin mau keluar Gem?')">
                            <i class="fas fa-sign-out-alt me-2"></i> <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 main-content">
            <div class="row mb-4 animate__animated animate__fadeInDown">
                <div class="col-12 welcome-text">
                    <h2 class="fw-bold text-dark">Tambah Akun TK 🏫</h2>
                    <p class="text-muted">Buat akun akses sistem Sate Sapi untuk sekolah TK baru.</p>
                </div>
            </div>

            <div class="form-container animate__animated animate__fadeInUp">
                
                <!-- Notifikasi Error Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 mb-4 border-0" style="background-color: #fee2e2; color: #991b1b;">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/admin/tambah-sekolah" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Nama Sekolah TK</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: TK Mawar" required class="form-control shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">NPSN Sekolah</label>
                        <input type="text" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan 8 Digit Nomor NPSN" maxlength="8" required class="form-control shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Username (Untuk Login)</label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Contoh: tkmawar (Tanpa spasi)" required class="form-control shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Password Awal</label>
                        <input type="password" name="password" placeholder="Minimal 6 karakter" required class="form-control shadow-sm">
                        <small class="text-muted mt-1 d-block"><i class="fas fa-info-circle me-1"></i> Password ini nanti bisa diganti oleh pihak TK.</small>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save me-2"></i> Simpan Akun Sekolah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
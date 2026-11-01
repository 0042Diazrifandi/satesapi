<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekolah TK - Sate Sapi</title>
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
        
        /* Table Container Styling */
        .table-container { background: white; border-radius: 30px; padding: 35px; box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05); }
        .table thead th { border-bottom: 2px solid #ede9fe; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; padding-bottom: 15px; }
        .table tbody td { padding: 20px 15px; vertical-align: middle; border-bottom: 1px solid #f8fafc; transition: all 0.3s; }
        .table tbody tr:hover td { background-color: #f8fafc; }
        
        /* Avatar Initial & Image Styling */
        .avatar-circle {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #c084fc 0%, #9333ea 100%);
            color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.2rem; box-shadow: 0 4px 10px rgba(147, 51, 234, 0.2); flex-shrink: 0;
        }
        .avatar-img {
            width: 48px; height: 48px; border-radius: 50%; object-fit: cover;
            border: 2px solid #ede9fe; box-shadow: 0 4px 10px rgba(147, 51, 234, 0.2); flex-shrink: 0;
        }

        .badge-npsn {
            background-color: #f1f5f9; color: #475569; font-weight: 700; padding: 8px 15px;
            border-radius: 10px; border: 1px solid #e2e8f0;
        }

        .btn-add {
            background: #8b5cf6; color: white; border-radius: 50px; font-weight: 700;
            padding: 10px 25px; border: none; box-shadow: 0 4px 0 #6d28d9; transition: 0.3s; text-decoration: none;
        }
        .btn-add:hover { background: #7c3aed; color: white; transform: translateY(2px); box-shadow: 0 2px 0 #6d28d9; }

        @media (max-width: 768px) {
            .sidebar { position: fixed; bottom: 0; left: 0; top: auto; width: 100%; min-height: auto; border-radius: 25px 25px 0 0; padding: 15px 10px; display: flex; flex-direction: row; justify-content: space-around; box-shadow: 0 -5px 20px rgba(88, 28, 135, 0.15); }
            .sidebar-header, .sidebar hr { display: none; }
            .sidebar nav { display: flex; width: 100%; justify-content: space-around; margin: 0; }
            .nav-link-admin { padding: 8px; margin-bottom: 0; font-size: 0.7rem; display: flex; flex-direction: column; align-items: center; gap: 5px; }
            .nav-link-admin:hover, .nav-link-admin.active { transform: translateY(-5px); }
            .nav-link-admin i { margin: 0 !important; font-size: 1.3rem; }
            .nav-link-admin span { display: block; }
            .main-content { margin-left: 0; padding: 20px 15px 100px 15px; }
            .welcome-text h2 { font-size: 1.6rem; }
            .table-container { padding: 20px; border-radius: 20px; }
            .btn-add { width: 100%; text-align: center; margin-top: 15px; }
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

                    @if(Auth::user()->role === 'dinas')
                        <a href="/admin/daftar-sekolah" class="nav-link-admin active">
                            <i class="fas fa-list me-2"></i> <span>Data Sekolah</span>
                        </a>
                        <a href="/admin/tambah-sekolah" class="nav-link-admin">
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
            <div class="row mb-5 animate__animated animate__fadeInDown">
                <div class="col-md-8 welcome-text">
                    <h2 class="fw-bold text-dark">Data Sekolah Terdaftar 🏫</h2>
                    <p class="text-muted">Kelola dan pantau seluruh akun Taman Kanak-Kanak yang terhubung ke sistem Sate Sapi.</p>
                </div>
                <div class="col-md-4 text-md-end d-flex align-items-center justify-content-md-end">
                    <a href="/admin/tambah-sekolah" class="btn-add">
                        <i class="fas fa-plus me-2"></i> Tambah TK Baru
                    </a>
                </div>
            </div>

            <div class="table-container animate__animated animate__fadeInUp">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-pill px-4 mb-4" role="alert" style="background-color: #dcfce7; border-color: #bbf7d0; color: #166534;">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table border-0">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="40%">Profil Sekolah</th>
                                <th width="25%">Nomor NPSN</th>
                                <th width="30%">Akun Login</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data_sekolah as $index => $sekolah)
                            <tr>
                                <td class="text-center text-muted fw-bold">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- CEK FOTO PROFIL DI SINI -->
                                        @if($sekolah->foto_sekolah)
                                            <img src="{{ asset('uploads/profil/' . $sekolah->foto_sekolah) }}" class="avatar-img me-3" alt="Foto {{ $sekolah->name }}">
                                        @else
                                            <div class="avatar-circle me-3">
                                                {{ strtoupper(substr($sekolah->name, 0, 1)) }}
                                            </div>
                                        @endif
                                        
                                        <div>
                                            <a href="/admin/sekolah/{{ $sekolah->id }}" class="fw-bold text-primary d-block text-decoration-none" style="font-size: 1.05rem; transition: 0.2s;">
                                                {{ $sekolah->name }} <i class="fas fa-external-link-alt ms-1" style="font-size: 0.8rem;"></i>
                                            </a>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt me-1 text-danger opacity-75"></i> Taman Kanak-Kanak</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-npsn"><i class="fas fa-id-card me-1 text-primary opacity-75"></i> {{ $sekolah->npsn ?? '-' }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center bg-light p-2 rounded-3 d-inline-flex border">
                                        <i class="fas fa-user-circle text-secondary me-2 fs-5"></i>
                                        <span class="text-dark fw-bold" style="letter-spacing: 0.5px;">{{ $sekolah->username }}</span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 border-0">
                                    <div class="p-4 rounded-4 bg-light d-inline-block mb-3 text-muted">
                                        <i class="fas fa-school fa-3x opacity-50"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark">Belum Ada Data Sekolah</h5>
                                    <p class="text-muted mb-4">Silakan daftarkan akun sekolah TK pertama Anda.</p>
                                    <a href="/admin/tambah-sekolah" class="btn btn-outline-primary rounded-pill px-4 fw-bold">Daftarkan Sekarang</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
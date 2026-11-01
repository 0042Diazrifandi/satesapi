<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">
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
        .table-container {
            background: white;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05);
        }
        .img-admin-table {
            width: 70px; height: 50px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #ede9fe;
        }
        .btn-password {
            background: #c084fc;
            color: white;
            border-radius: 50px;
            font-weight: 700;
            border: none;
            box-shadow: 0 4px 0 #a855f7;
            transition: 0.3s;
        }
        .btn-password:hover { background: #a855f7; color: white; transform: translateY(2px); box-shadow: 0 2px 0 #9333ea; }
        .btn-hapus {
            background: #ff6b6b;
            color: white;
            border-radius: 12px;
            border: none;
            padding: 8px 15px;
            transition: 0.3s;
        }
        .btn-hapus:hover { background: #ee5253; transform: scale(1.1); box-shadow: 0 5px 10px rgba(238, 82, 83, 0.2); }
        .table tbody td { padding: 15px; vertical-align: middle; }

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
            .header-actions { justify-content: flex-start !important; margin-top: 15px; flex-wrap: wrap; }
            .btn-password { font-size: 0.9rem; padding: 10px 20px !important; }
            .table-container { padding: 15px; border-radius: 20px; }
            .table th, .table td { font-size: 0.9rem; padding: 10px; white-space: nowrap; }
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
                    <small class="opacity-75">By Sari Yuliastuti</small>
                </div>
                <nav>
                    <a href="/admin/dashboard" class="nav-link-admin active">
                        <i class="fas fa-th-large me-2"></i> <span>Dashboard</span>
                    </a>

                    <!-- MENU KHUSUS ADMIN DINAS -->
                    @if(Auth::user()->role === 'dinas')
                        <a href="/admin/daftar-sekolah" class="nav-link-admin">
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
                <div class="col-md-7 welcome-text">
                    <h2 class="fw-bold text-dark">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                    <p class="text-muted">Pantau dan kelola data inovasi dengan rapi.</p>
                </div>
                <div class="col-md-5 header-actions text-end d-flex justify-content-md-end gap-2 align-items-center">
                    <a href="/admin/password" class="btn btn-password px-4 py-2 shadow-sm">
                        <i class="fas fa-key me-2"></i> Password
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
                    <table class="table table-hover border-light">
                        <thead>
                            <tr class="text-muted">
                                <th>Foto</th>
                                <th>Nama TK</th>
                                <th>Judul Inovasi</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($semua_inovasi as $item)
                            <tr>
                                <td>
                                    {{-- PERBAIKAN UTAMA: Decode JSON string foto dengan aman --}}
                                    @php
                                        $fotos = json_decode($item->foto, true);
                                        if (!is_array($fotos)) {
                                            $fotos = [$item->foto];
                                        }
                                        $foto_tampil = $fotos[0] ?? null;
                                    @endphp

                                    @if($foto_tampil)
                                        <img src="{{ asset('uploads/' . $foto_tampil) }}" class="img-admin-table shadow-sm" alt="Foto">
                                    @else
                                        <div class="img-admin-table bg-light d-flex align-items-center justify-content-center">
                                            <i class="fas fa-image text-muted opacity-50"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><span class="fw-bold text-dark">{{ $item->nama_tk }}</span></td>
                                <td><span class="text-muted">{{ Str::limit($item->judul_inovasi, 40) }}</span></td>
                                <td>
                                    @if($item->status == 'disetujui')
                                        <span class="badge bg-success rounded-pill px-3">Disetujui ✅</span>
                                    @elseif($item->status == 'ditolak')
                                        <span class="badge bg-danger rounded-pill px-3">Ditolak ❌</span>
                                    @else
                                        <span class="badge bg-warning text-dark rounded-pill px-3">Menunggu ⏳</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2 align-items-center">
                                        <!-- Tombol Hapus -->
                                        <form action="/admin/hapus/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini Gem?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-hapus" title="Hapus Data">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 border-0">
                                    <i class="fas fa-folder-open fa-3x text-muted mb-3 opacity-25"></i>
                                    <p class="text-muted">Belum ada karya inovasi yang disetujui.</p>
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Karya - Sate Sapi</title>
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

        .table tbody td { padding: 15px; vertical-align: middle; }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed; bottom: 0; left: 0; top: auto;
                width: 100%; min-height: auto;
                border-radius: 25px 25px 0 0; padding: 15px 10px;
                display: flex; flex-direction: row; justify-content: space-around;
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
            .table-container { padding: 15px; border-radius: 20px; }
            .table th, .table td { font-size: 0.9rem; padding: 10px; white-space: nowrap; }
        }

        /* Custom Modal Style */
        .modal-header-custom {
            background: linear-gradient(135deg, #6d28d9 0%, #9333ea 100%);
            color: white;
            border-bottom: none;
        }
        .img-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .img-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
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
                        <a href="/admin/daftar-sekolah" class="nav-link-admin">
                            <i class="fas fa-list me-2"></i> <span>Data Sekolah</span>
                        </a>
                        <a href="/admin/tambah-sekolah" class="nav-link-admin">
                            <i class="fas fa-school me-2"></i> <span>Add Sekolah</span>
                        </a>
                        <a href="/admin/verifikasi-karya" class="nav-link-admin active">
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
                    <h2 class="fw-bold text-dark">Verifikasi Karya 📝</h2>
                    <p class="text-muted">Cek dan setujui karya inovasi yang menunggu antrean.</p>
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
                                <th>Nama TK</th>
                                <th>Judul Inovasi</th>
                                <th>Deskripsi Singkat</th>
                                <th class="text-center">Aksi Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inovasi_pending as $item)
                            <tr>
                                <td><span class="fw-bold text-dark">{{ $item->nama_tk }}</span></td>
                                <td><span class="text-muted">{{ Str::limit($item->judul_inovasi, 40) }}</span></td>
                                <td><span class="text-muted">{{ Str::limit($item->deskripsi, 50) }}</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2 align-items-center">
                                        
                                        <!-- Tombol Pemicu Modal Detail -->
                                        <button type="button" class="btn btn-info btn-sm px-3 py-2 rounded-3 shadow-sm text-white fw-bold" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}" title="Lihat Detail Lengkap">
                                            <i class="fas fa-search me-1"></i> Cek Preview
                                        </button>

                                        <!-- Tombol ACC -->
                                        <form action="/admin/verifikasi/{{ $item->id }}" method="POST" class="d-inline">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="disetujui">
                                            <button type="submit" class="btn btn-success btn-sm px-3 py-2 rounded-3 shadow-sm" title="Setujui Karya">
                                                <i class="fas fa-check me-1"></i> ACC
                                            </button>
                                        </form>

                                        <!-- Tombol Tolak -->
                                        <form action="/admin/verifikasi/{{ $item->id }}" method="POST" class="d-inline">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="btn btn-danger btn-sm px-3 py-2 rounded-3 shadow-sm" title="Tolak Karya">
                                                <i class="fas fa-times me-1"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 border-0">
                                    <i class="fas fa-check-circle fa-3x text-success mb-3 opacity-50"></i>
                                    <p class="text-muted">Yeay! Tidak ada karya yang menunggu verifikasi saat ini.</p>
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

<!-- ========================================================================================= -->
<!-- KUMPULAN MODAL (Ditaruh di luar tabel dan container) -->
<!-- ========================================================================================= -->
@foreach($inovasi_pending as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content text-start border-0 shadow-lg">
            <div class="modal-header modal-header-custom p-4">
                <h4 class="modal-title fw-bold"><i class="fas fa-lightbulb me-2 text-warning"></i>{{ $item->judul_inovasi }}</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h6 class="text-muted mb-2 text-uppercase fw-bold"><i class="fas fa-school me-2 text-primary"></i>Asal Instansi</h6>
                        <p class="fw-bold text-dark fs-5 mb-1">{{ $item->nama_tk }}</p>
                        <span class="badge bg-secondary px-3 py-2">NPSN: {{ $item->npsn ?? 'Tidak diisi' }}</span>
                    </div>
                    <div class="col-md-6 border-start-md ps-md-4">
                        <h6 class="text-muted mb-3 text-uppercase fw-bold"><i class="fas fa-users me-2 text-info"></i>Tim Guru Inovator</h6>
                        <ul class="list-unstyled mb-0">
                            @php
                                $gurus = json_decode($item->nama_guru, true);
                                if (!is_array($gurus)) {
                                    $gurus = [$item->nama_guru];
                                }
                            @endphp
                            @foreach($gurus as $guru)
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>{{ $guru }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <hr class="my-4 text-muted">

                <div class="mb-5">
                    <h5 class="fw-bold mb-3 text-dark"><i class="fas fa-align-left me-2 text-primary"></i>Deskripsi Inovasi</h5>
                    <div class="bg-light p-4 rounded-4 border">
                        <p class="mb-0 text-dark" style="white-space: pre-wrap; text-align: justify; line-height: 1.8;">{{ $item->deskripsi }}</p>
                    </div>
                </div>

                @if($item->link_ppt)
                <div class="mb-5">
                    <h5 class="fw-bold mb-3 text-dark"><i class="fas fa-link me-2 text-primary"></i>Tautan Tambahan (PPT / Video)</h5>
                    <a href="{{ $item->link_ppt }}" target="_blank" class="btn btn-outline-primary btn-lg rounded-pill px-4 shadow-sm">
                        Buka Tautan <i class="fas fa-external-link-alt ms-2"></i>
                    </a>
                </div>
                @endif

                <div>
                    <h5 class="fw-bold mb-4 text-dark"><i class="fas fa-images me-2 text-primary"></i>Lampiran Foto Karya</h5>
                    <div class="row g-4">
                        {{-- PERBAIKAN UTAMA: Decode JSON foto di modal dengan aman --}}
                        @php
                            $fotos = json_decode($item->foto, true);
                            if (!is_array($fotos)) {
                                $fotos = [$item->foto];
                            }
                        @endphp

                        @if(is_array($fotos) && count($fotos) > 0 && !empty($fotos[0]))
                            @foreach($fotos as $f)
                                <div class="col-md-6 col-lg-4">
                                    <a href="{{ asset('uploads/' . $f) }}" target="_blank" title="Klik untuk perbesar foto">
                                        <img src="{{ asset('uploads/' . $f) }}" class="img-preview shadow-sm" alt="Foto Karya">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-5 bg-light rounded-4 border">
                                <i class="fas fa-image fa-3x mb-3 text-muted opacity-25"></i>
                                <p class="text-muted fs-5 mb-0">Tidak ada lampiran foto untuk karya ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light p-3">
                <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup Preview</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
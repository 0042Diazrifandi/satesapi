<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaTe SaPi - Galeri Inovasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f5fa;
            overflow-x: hidden;
        }

        .header-banner-container {
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            overflow: hidden;
            background-color: #4c1d95; 
        }

        .banner-img {
            width: 100%;
            max-height: 480px;
            object-fit: contain; 
            background-color: #f9f9f9; 
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            transition: all 0.3s ease;
        }

        .search-container {
            margin-top: -45px;
            position: relative;
            z-index: 100;
        }
        
        .search-input {
            border-radius: 50px;
            border: 5px solid white;
            padding: 15px 30px;
            box-shadow: 0 10px 25px rgba(88, 28, 135, 0.15);
            font-weight: 700;
            transition: all 0.3s ease;
        }
        .search-input:focus {
            border-color: #c4b5fd;
            box-shadow: 0 15px 35px rgba(109, 40, 217, 0.25);
            transform: translateY(-2px);
            outline: none;
        }
        
        .btn-cari {
            background-color: #8b5cf6;
            color: white;
            border-radius: 50px;
            font-weight: 800;
            padding: 0 30px;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-cari:hover { background-color: #7c3aed; transform: scale(1.05); color: white; }
        .btn-cari:active { transform: scale(0.95); }

        .card-inovasi {
            border: 8px solid white; 
            border-radius: 35px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: white;
            box-shadow: 0 10px 25px rgba(88, 28, 135, 0.08);
            overflow: hidden;
            text-decoration: none;
            display: block; 
        }
        .card-inovasi:hover {
            transform: scale(1.03) translateY(-8px);
            box-shadow: 0 20px 40px rgba(109, 40, 217, 0.15);
        }
        .card-inovasi:active {
            transform: scale(0.98);
            box-shadow: 0 5px 15px rgba(109, 40, 217, 0.1);
        }

        .img-gemoy {
            border-radius: 25px;
            height: 220px;
            object-fit: cover;
            margin: 15px;
            width: calc(100% - 30px); /* Diperbaiki dari error typo sebelumnya */
            transition: 0.3s;
        }
        .card-inovasi:hover .img-gemoy {
            transform: scale(1.02);
        }

        .badge-tk {
            background-color: #ede9fe;
            color: #6d28d9;
            font-weight: 800;
            padding: 8px 20px;
            border-radius: 50px;
            display: inline-block;
            transition: 0.3s;
        }

        .badge-guru {
            background-color: #f8f9fa;
            color: #636e72;
            font-weight: 700;
            padding: 6px 15px;
            border-radius: 20px;
            border: 1px solid #dfe6e9;
            font-size: 0.8rem;
            display: inline-block;
        }

        .navbar-brand { font-weight: 800; font-size: 1.8rem; color: white !important; letter-spacing: 1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
        .btn-admin-top {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid white;
            color: #6d28d9;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }
        .btn-admin-top:hover {
            background: white;
            color: #7c3aed;
        }

        @media (max-width: 768px) {
            .header-banner-container, .banner-img {
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
            }
            .banner-img {
                max-height: 250px; 
                margin-top: 70px; 
            }
            .navbar {
                padding-top: 15px !important;
            }
            .navbar-brand {
                font-size: 1.4rem; 
            }
            .btn-admin-top {
                padding: 5px 15px !important;
                font-size: 0.9rem;
            }
            .search-container {
                margin-top: -30px; 
                padding: 0 15px;
            }
            .search-input {
                padding: 12px 20px;
                font-size: 0.95rem;
                border-width: 4px;
            }
            .card-inovasi {
                border-width: 5px; 
                border-radius: 25px;
            }
            .img-gemoy {
                height: 180px; 
                margin: 10px;
                width: calc(100% - 20px);
                border-radius: 15px;
            }
            .card-body h4 {
                font-size: 1.25rem; 
            }
        }
    </style>
</head>
<body>

    <div class="header-banner-container text-center">
        <nav class="navbar navbar-expand-lg position-absolute w-100 pt-4 z-3">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="/galeri">SATE SAPI</a>
                <a href="/login-admin" class="btn btn-admin-top shadow-sm">Login</a>
            </div>
        </nav>

        <div class="container-fluid p-0">
            <img src="{{ asset('uploads/sate sapi bg.png') }}" alt="Banner Sate Sapi" class="banner-img">
        </div>
    </div>

    <div class="container search-container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="/galeri" method="GET">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control search-input" 
                               placeholder="Ketik nama TK, NPSN, atau judul..." value="{{ $cari ?? '' }}">
                        <button class="btn btn-cari shadow" type="submit">Cari! ✨</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        @if($cari)
            <div class="text-center mb-4">
                <span class="badge bg-white shadow-sm p-3 px-4 rounded-pill" style="color: #7c3aed;">
                    🔍 Menampilkan hasil: <strong>{{ $cari }}</strong> | <a href="/galeri" class="ms-2 text-decoration-none fw-bold" style="color: #6d28d9;">Reset</a>
                </span>
            </div>
        @endif

        <div class="row px-2 px-md-0">
            @forelse($semua_inovasi as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                
                <a href="/galeri/{{ $item->id }}" class="card card-inovasi h-100 animate__animated animate__fadeInUp">
                    
                    {{-- PERBAIKAN UTAMA DI SINI: Decode JSON string ke array dengan aman --}}
                    @php
                        $fotos = json_decode($item->foto, true);
                        if (!is_array($fotos)) {
                            $fotos = [$item->foto];
                        }
                        $foto_tampil = $fotos[0] ?? null;
                    @endphp

                    @if($foto_tampil)
                        <img src="{{ asset('uploads/' . $foto_tampil) }}" class="img-gemoy" alt="Foto Inovasi">
                    @else
                        <div class="img-gemoy bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-3x text-muted opacity-50"></i>
                        </div>
                    @endif
                    
                    <div class="card-body p-3 p-md-4 text-center d-flex flex-column justify-content-between">
                        
                        <div>
                            <div class="mb-3">
                                <span class="badge badge-tk px-3 py-2" style="white-space: normal;">
                                    {{ $item->nama_tk }}
                                </span>
                            </div>
                            <h4 class="fw-bold text-dark mb-3" style="line-height: 1.4;">{{ $item->judul_inovasi }}</h4>
                        </div>
                        
                        <div class="mt-2 pt-3 border-top" style="border-color: #f1f2f6 !important;">
                            <div class="text-muted small mb-2"><i class="fas fa-chalkboard-teacher me-1"></i> Guru Inovator:</div>
                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                @php
                                    $gurunya = json_decode($item->nama_guru, true);
                                    if (!is_array($gurunya)) {
                                        $gurunya = [$item->nama_guru];
                                    }
                                @endphp
                                
                                @foreach($gurunya as $g)
                                    <span class="badge-guru">{{ $g }}</span>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </a>

            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="card border-0 rounded-5 shadow-sm p-5 bg-white mx-auto" style="max-width: 400px;">
                    <i class="fas fa-box-open fa-3x text-muted mb-3 opacity-50"></i>
                    <h4 class="fw-bold text-muted">Belum ada karya nih... 😅</h4>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
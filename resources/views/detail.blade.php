<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karya - {{ $inovasi->judul_inovasi }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f5fa; /* Background ungu muda serasi dengan yang lain */
            padding-bottom: 50px;
        }

        .carousel-container-gemoy {
            background: white;
            border-radius: 40px;
            padding: 20px;
            box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05);
            overflow: hidden;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
            border-radius: 25px;
            background-color: #fcfdfe;
        }

        .card-detail {
            border: none;
            border-radius: 40px;
            box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05);
            background: white;
        }

        .badge-tk {
            background: linear-gradient(135deg, #c4b5fd 0%, #a78bfa 100%);
            color: #4c1d95;
            font-weight: 800;
            padding: 10px 25px;
            border-radius: 50px;
            display: inline-block;
        }

        .badge-npsn {
            background-color: #ffffff;
            color: #6d28d9;
            font-weight: 700;
            padding: 9px 20px;
            border-radius: 50px;
            display: inline-block;
            border: 2px solid #ede9fe;
            font-size: 0.9rem;
        }

        .badge-guru {
            background-color: #f8f9fa;
            color: #4c1d95;
            font-weight: 700;
            padding: 8px 15px;
            border-radius: 15px;
            border-left: 4px solid #8b5cf6;
            font-size: 0.85rem;
        }

        .btn-back {
            color: #7c3aed;
            text-decoration: none;
            font-weight: 800;
            transition: 0.2s;
            background: white;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(88, 28, 135, 0.05);
            display: inline-block;
        }
        .btn-back:hover { 
            color: #581c87; 
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(88, 28, 135, 0.1);
        }

        .btn-ppt-big {
            background-color: #8b5cf6;
            color: white !important;
            font-weight: 800;
            border-radius: 50px;
            border: 5px solid white;
            box-shadow: 0 6px 0px #6d28d9;
            transition: 0.2s;
            text-align: center;
        }
        .btn-ppt-big:hover {
            background-color: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 8px 0px #6d28d9;
        }
        .btn-ppt-big:active { 
            transform: translateY(4px); 
            box-shadow: 0 2px 0px #6d28d9; 
        }

        /* KHUSUS UNTUK TAMPILAN MOBILE (HP) */
        @media (max-width: 768px) {
            .container.mt-5 {
                margin-top: 1.5rem !important;
            }
            .carousel-container-gemoy {
                padding: 10px;
                border-radius: 25px;
            }
            .carousel-item img {
                max-height: 250px; /* Gambar tidak memakan layar penuh di HP */
                border-radius: 15px;
            }
            .card-detail {
                border-radius: 25px;
            }
            .card-detail.p-4 {
                padding: 1.5rem !important;
            }
            .card-body {
                padding: 0; /* Menghilangkan ekstra padding bawaan bootstrap card di layar kecil */
            }
            h1.fw-extrabold {
                font-size: 1.5rem;
                line-height: 1.3;
            }
            .badge-tk, .badge-npsn {
                padding: 8px 15px;
                font-size: 0.8rem;
            }
            .btn-ppt-big {
                font-size: 0.95rem;
                padding: 12px !important;
            }
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="mb-4">
        <a href="/galeri" class="btn-back"><i class="fas fa-arrow-left me-2"></i> Kembali ke Galeri</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="carousel-container-gemoy text-center animate__animated animate__fadeInLeft">
                <div id="carouselInovasi" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      @php
                        // Decode string JSON dari database menjadi array PHP dengan aman
                             $fotos = json_decode($inovasi->foto, true);
    
                             // Fallback kalau seandainya format datanya bukan array
                                 if (!is_array($fotos)) {
                                   $fotos = [$inovasi->foto];
                                    }
                      @endphp

                        @foreach($fotos as $key => $f)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('uploads/' . $f) }}" class="d-block w-100" alt="Foto Inovasi">
                        </div>
                        @endforeach
                    </div>

                    @if(count($fotos) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselInovasi" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 shadow" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselInovasi" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3 shadow" aria-hidden="true"></span>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card card-detail h-100 p-4 animate__animated animate__fadeInRight">
                <div class="card-body">
                    <div class="mb-3 d-flex flex-wrap gap-2 align-items-center">
                        <span class="badge-tk"><i class="fas fa-school me-2"></i>{{ $inovasi->nama_tk }}</span>
                        <span class="badge-npsn"><i class="fas fa-id-card me-2 opacity-75"></i>NPSN: {{ $inovasi->npsn ?? '-' }}</span>
                    </div>
                    
                    <h1 class="fw-extrabold text-dark mb-4">{{ $inovasi->judul_inovasi }}</h1>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color: #7c3aed;"><i class="fas fa-chalkboard-teacher me-2"></i>Guru Penanggung Jawab:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @php
                                $gurunya = is_array($inovasi->nama_guru) ? $inovasi->nama_guru : [$inovasi->nama_guru];
                            @endphp
                            
                            @foreach($gurunya as $g)
                                <div class="badge-guru shadow-sm">
                                    {{ $g }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3" style="color: #7c3aed;">Tentang Inovasi:</h5>
                    <p class="text-muted" style="line-height: 1.8; text-align: justify; white-space: pre-line;">
                        {{ $inovasi->deskripsi }}
                    </p>

                    <hr class="my-5 opacity-25" style="border-color: #8b5cf6;">

                    <div class="d-grid">
                        @if($inovasi->link_ppt)
                            <a href="{{ $inovasi->link_ppt }}" target="_blank" class="btn btn-ppt-big py-3 shadow">
                                <i class="fab fa-google-drive me-2"></i> BUKA MATERI PPT SERU
                            </a>
                        @else
                            <div class="alert text-center rounded-pill" style="background-color: #ede9fe; color: #6d28d9; border: 1px dashed #c4b5fd;">
                                <i class="fas fa-folder-open me-2"></i><small class="fw-bold">Materi PPT belum tersedia</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
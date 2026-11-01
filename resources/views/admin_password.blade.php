<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f5fa; /* Disamakan dengan background Dashboard & Edit */
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 20px; /* Tambahan padding supaya di HP tidak menempel ujung layar */
        }

        .card-password {
            border: none;
            border-radius: 40px;
            background: white;
            box-shadow: 0 20px 40px rgba(88, 28, 135, 0.08); /* Shadow ungu tipis */
            overflow: hidden;
            width: 100%;
        }

        .header-password {
            background: linear-gradient(135deg, #7c3aed 0%, #581c87 100%); /* Tema ungu utama */
            padding: 40px;
            color: white;
            text-align: center;
        }

        .form-label-gemoy {
            font-weight: 700;
            color: #2d3436;
            margin-left: 15px;
            margin-bottom: 8px;
        }

        .input-gemoy {
            border-radius: 50px;
            padding: 12px 25px;
            border: 2px solid #ede9fe;
            transition: all 0.3s;
        }

        .input-gemoy:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.2);
            outline: none;
        }

        .btn-update-password {
            background: #8b5cf6;
            color: white;
            border-radius: 50px;
            font-weight: 800;
            border: none;
            padding: 15px;
            box-shadow: 0 8px 15px rgba(109, 40, 217, 0.2);
            transition: all 0.3s;
        }

        .btn-update-password:hover {
            background: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(109, 40, 217, 0.3);
            color: white;
        }

        /* KHUSUS UNTUK TAMPILAN MOBILE (HP) */
        @media (max-width: 768px) {
            .card-password {
                border-radius: 30px;
            }
            .header-password {
                padding: 30px 20px;
            }
            .header-password h2 {
                font-size: 1.5rem;
            }
            .card-body.p-5 {
                padding: 30px 20px !important;
            }
            .input-gemoy {
                padding: 10px 20px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="card card-password animate__animated animate__zoomIn">
                <div class="header-password">
                    <i class="fas fa-shield-alt fa-3x mb-3"></i>
                    <h2 class="fw-bold">Keamanan Akun</h2>
                    <p class="mb-0 opacity-75">Ganti password biar makin aman!</p>
                </div>

                <div class="card-body p-5">
                    <!-- Menampilkan Error jika validasi gagal -->
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-pill px-4 small mb-4" style="background-color: #fee2e2; border-color: #fca5a5; color: #991b1b;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/admin/password/update" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label-gemoy small">Password Saat Ini</label>
                            <input type="password" name="password_lama" class="form-control input-gemoy" required placeholder="Ketik password lama">
                        </div>

                        <div class="mb-4">
                            <label class="form-label-gemoy small">Password Baru (Min. 6 Karakter)</label>
                            <input type="password" name="password_baru" class="form-control input-gemoy" required placeholder="Password baru">
                        </div>

                        <div class="mb-4">
                            <label class="form-label-gemoy small">Ulangi Password Baru</label>
                            <input type="password" name="password_baru_confirmation" class="form-control input-gemoy" required placeholder="Ulangi password baru">
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-update-password">
                                <i class="fas fa-key me-2"></i> Update Password ✨
                            </button>
                            <a href="/admin/dashboard" class="btn btn-link text-muted mt-2 text-decoration-none small text-center">
                                <i class="fas fa-arrow-left me-1"></i> Batal & Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
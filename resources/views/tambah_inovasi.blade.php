<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karya - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #f7f5fa; min-height: 100vh; overflow-x: hidden; }
        
        /* Sidebar Styling */
        .sidebar { background: linear-gradient(180deg, #581c87 0%, #7c3aed 100%); min-height: 100vh; color: white; padding: 30px 20px; border-top-right-radius: 40px; border-bottom-right-radius: 40px; position: fixed; width: inherit; z-index: 1000; }
        .nav-link-admin { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 15px; margin-bottom: 10px; transition: all 0.3s; text-decoration: none; display: block; font-weight: 700; }
        .nav-link-admin:hover, .nav-link-admin.active { background: white; color: #6d28d9; transform: translateX(10px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        
        .main-content { margin-left: 16.666667%; padding: 40px; }
        
        /* Form Container Mewah & Gemoy */
        .form-container { background: white; border-radius: 30px; padding: 40px; box-shadow: 0 15px 35px rgba(88, 28, 135, 0.05); max-width: 750px; }
        
        /* Input Styling Gemoy */
        .input-group-text { background-color: #f8fafc; border: 2px solid #ede9fe; border-right: none; border-radius: 15px 0 0 15px; color: #a855f7; }
        .form-control { border-radius: 0 15px 15px 0; padding: 12px 20px; border: 2px solid #ede9fe; border-left: none; background-color: #f8fafc; transition: all 0.3s; font-weight: 600; color: #475569; }
        .form-control:focus { border-color: #8b5cf6; box-shadow: none; background-color: white; }
        .form-control:focus + .input-group-text { border-color: #8b5cf6; background-color: white; }
        
        textarea.form-control { border-radius: 15px !important; border-left: 2px solid #ede9fe !important; padding-left: 20px !important; }
        .form-control:read-only { background-color: #f1f5f9; color: #94a3b8; cursor: not-allowed; }
        
        .form-label { font-weight: 800; color: #334155; margin-bottom: 10px; font-size: 0.95rem; }
        
        .btn-tambah-guru { border-radius: 50px; font-weight: 700; font-size: 0.8rem; color: #7c3aed; border-color: #7c3aed; margin-top: 5px; transition: 0.3s; }
        .btn-tambah-guru:hover { background-color: #7c3aed; color: white; }

        .btn-terbit { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white; border-radius: 50px; font-weight: 800; border: none; padding: 15px 30px; box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3); transition: 0.3s; width: 100%; font-size: 1.1rem; }
        .btn-terbit:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(124, 58, 237, 0.4); color: white; }

        @media (max-width: 768px) {
            .sidebar { position: fixed; bottom: 0; left: 0; top: auto; width: 100%; min-height: auto; border-radius: 25px 25px 0 0; padding: 15px 10px; display: flex; flex-direction: row; justify-content: space-around; box-shadow: 0 -5px 20px rgba(88, 28, 135, 0.15); }
            .sidebar-header, .sidebar hr { display: none; }
            .sidebar nav { display: flex; width: 100%; justify-content: space-around; margin: 0; }
            .nav-link-admin { padding: 8px; margin-bottom: 0; font-size: 0.7rem; display: flex; flex-direction: column; align-items: center; gap: 5px; }
            .nav-link-admin:hover, .nav-link-admin.active { transform: translateY(-5px); }
            .nav-link-admin i { margin: 0 !important; font-size: 1.3rem; }
            .nav-link-admin span { display: block; }
            .main-content { margin-left: 0; padding: 20px 15px 100px 15px; }
            .form-container { padding: 25px; border-radius: 20px; }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Dinamis (Dinas vs TK) -->
        <div class="col-md-2 p-0">
            <div class="sidebar shadow-lg">
                <div class="text-center mb-5 sidebar-header">
                    <h3 class="fw-extrabold text-white">SATE SAPI</h3>
                    <small class="opacity-75">{{ Auth::user()->role === 'dinas' ? 'Admin Panel v2.0' : 'Panel Sekolah TK' }}</small>
                </div>
                <nav>
                    @if(Auth::user()->role === 'dinas')
                        <a href="/admin/dashboard" class="nav-link-admin">
                            <i class="fas fa-th-large me-2"></i> <span>Dashboard</span>
                        </a>
                        <a href="/admin/daftar-sekolah" class="nav-link-admin">
                            <i class="fas fa-list me-2"></i> <span>Data Sekolah</span>
                        </a>
                        <a href="/admin/tambah-sekolah" class="nav-link-admin">
                            <i class="fas fa-school me-2"></i> <span>Add Sekolah</span>
                        </a>
                        <a href="/admin/verifikasi-karya" class="nav-link-admin">
                            <i class="fas fa-check-double me-2"></i> <span>Verif Karya</span>
                        </a>
                    @else
                        <a href="/tk/dashboard" class="nav-link-admin">
                            <i class="fas fa-th-large me-2"></i> <span>Dashboard</span>
                        </a>
                        <a href="/tambah-inovasi" class="nav-link-admin active">
                            <i class="fas fa-rocket me-2"></i> <span>Kirim Karya</span>
                        </a>
                    @endif

                    <a href="/admin/password" class="nav-link-admin">
                        <i class="fas fa-lock me-2"></i> <span>Password</span>
                    </a>
                    <a href="/galeri" class="nav-link-admin">
                        <i class="fas fa-eye me-2"></i> <span>Galeri Publik</span>
                    </a>
                    <hr class="text-white opacity-25">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link-admin text-warning bg-transparent border-0 w-100 text-start" onclick="return confirm('Yakin mau keluar?')">
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
                    <h2 class="fw-bold text-dark">Kirim Karya Seru! 🚀</h2>
                    <p class="text-muted">Lengkapi formulir di bawah ini untuk memamerkan portofolio inovasi sekolahmu!</p>
                </div>
            </div>

            <div class="form-container animate__animated animate__fadeInUp">
                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 mb-4 border-0 d-flex align-items-center" style="background-color: #fee2e2; color: #991b1b;">
                        <i class="fas fa-exclamation-triangle fa-2x me-3 opacity-75"></i>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/tambah-inovasi" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- NAMA TK (TERKUNCI) -->
                    <div class="mb-4">
                        <label class="form-label">Nama Sekolah TK</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text"><i class="fas fa-school"></i></span>
                            <input type="text" name="nama_tk" value="{{ Auth::user()->name }}" class="form-control" readonly>
                            <span class="input-group-text bg-light text-muted border-start-0" style="border-radius: 0 15px 15px 0;"><i class="fas fa-lock"></i></span>
                        </div>
                    </div>

                    <!-- NPSN SEKOLAH -->
                    <div class="mb-4">
                        <label class="form-label">NPSN Sekolah</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" name="npsn" class="form-control" placeholder="Masukkan 8 digit NPSN" maxlength="8">
                        </div>
                    </div>

                    <!-- GURU PENANGGUNG JAWAB (DINAMIS) -->
                    <div class="mb-4">
                        <label class="form-label">Guru Penanggung Jawab</label>
                        <div id="guru-container">
                            <div class="input-group mb-2 shadow-sm">
                                <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                <input type="text" name="nama_guru[]" class="form-control" required placeholder="Nama Guru 1">
                            </div>
                        </div>
                        <button type="button" onclick="tambahGuru()" class="btn btn-outline-primary btn-sm btn-tambah-guru px-3 mt-1">
                            <i class="fas fa-plus me-1"></i> Tambah Guru Lain
                        </button>
                    </div>

                    <!-- JUDUL KARYA -->
                    <div class="mb-4">
                        <label class="form-label">Judul Karya / Inovasi</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text"><i class="fas fa-lightbulb"></i></span>
                            <input type="text" name="judul_inovasi" value="{{ old('judul_inovasi') }}" placeholder="Contoh: Media Tanam Hidroponik" required class="form-control">
                        </div>
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-4">
                        <label class="form-label">Cerita Singkat Inovasi</label>
                        <textarea name="deskripsi" rows="4" placeholder="Ceritakan keseruan inovasi ini..." required class="form-control textarea-custom shadow-sm">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- FOTO INOVASI -->
                    <div class="mb-4">
                        <label class="form-label">Foto Inovasi (Bisa Pilih Banyak)</label>
                        <input type="file" name="foto[]" multiple accept="image/*" required class="form-control shadow-sm" style="border-radius: 15px; border-left: 2px solid #ede9fe;">
                        <small class="text-muted ms-2 mt-1 d-block"><i class="fas fa-info-circle me-1"></i> Tahan tombol <b>Ctrl</b> untuk memilih lebih dari 1 foto!</small>
                    </div>

                    <!-- LINK PPT -->
                    <div class="mb-5">
                        <label class="form-label">Link PPT (Google Drive) - Opsional</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text"><i class="fab fa-google-drive"></i></span>
                            <input type="url" name="link_ppt" class="form-control" placeholder="https://drive.google.com/...">
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON W/ LOADING -->
                    <div class="d-grid gap-2 text-center mt-4">
                        <button type="submit" id="btnSubmit" class="btn btn-terbit">
                            <span id="btnText"><i class="fas fa-rocket me-2"></i>Upload Sekarang!</span>
                            <span id="btnLoading" class="d-none">
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Mengirim... 🚀
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi tambah input guru secara dinamis
    function tambahGuru() {
        const container = document.getElementById('guru-container');
        const newDiv = document.createElement('div');
        newDiv.className = 'input-group mb-2 shadow-sm animate__animated animate__fadeInDown';
        newDiv.innerHTML = `
            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
            <input type="text" name="nama_guru[]" class="form-control" required placeholder="Nama Guru Berikutnya">
        `;
        container.appendChild(newDiv);
    }

    // Script loading tombol
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('btnText').classList.add('d-none');
        document.getElementById('btnLoading').classList.remove('d-none');
        document.getElementById('btnSubmit').style.opacity = '0.7';
        document.getElementById('btnSubmit').style.pointerEvents = 'none';
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inovasi - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f5fa; /* Background disamakan dengan dashboard */
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px 15px; /* Tambah padding kiri-kanan biar di HP gak nempel layar */
        }

        .card-edit {
            border: none;
            border-radius: 40px;
            background: white;
            box-shadow: 0 20px 40px rgba(88, 28, 135, 0.08); /* Shadow ungu tipis */
            overflow: hidden;
        }

        .edit-header {
            /* Warna gradasi ungu disamakan dengan tema utama */
            background: linear-gradient(135deg, #7c3aed 0%, #581c87 100%);
            padding: 40px;
            color: white;
            text-align: center;
        }

        .form-label {
            font-weight: 700;
            color: #2d3436;
            margin-left: 15px;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 20px;
            padding: 12px 25px;
            border: 2px solid #ede9fe;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.2);
            outline: none;
        }

        .btn-update {
            background: #8b5cf6;
            color: white;
            border-radius: 50px;
            font-weight: 800;
            border: none;
            padding: 15px;
            box-shadow: 0 8px 15px rgba(109, 40, 217, 0.2);
            transition: all 0.3s;
        }

        .btn-update:hover {
            background: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(109, 40, 217, 0.3);
            color: white;
        }

        .preview-old-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 10px;
            border: 2px solid #ede9fe;
        }

        .btn-tambah-guru {
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            margin-top: 5px;
            color: #7c3aed;
            border-color: #7c3aed;
        }
        
        .btn-tambah-guru:hover {
            background-color: #7c3aed;
            color: white;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        /* KHUSUS UNTUK TAMPILAN MOBILE (HP) */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }
            .card-edit {
                border-radius: 30px;
            }
            .edit-header {
                padding: 30px 20px;
            }
            .edit-header h2 {
                font-size: 1.5rem;
            }
            /* Kurangi padding dalam card agar form tidak terlalu sempit di HP */
            .card-body.p-5 {
                padding: 25px 20px !important; 
            }
            .form-control {
                padding: 10px 20px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-edit animate__animated animate__zoomIn">
                <div class="edit-header">
                    <i class="fas fa-edit fa-3x mb-3"></i>
                    <h2 class="fw-bold">Edit Inovasi</h2>
                    <p class="mb-0 opacity-75">Update data karya "{{ $inovasi->judul_inovasi }}"</p>
                </div>

                <div class="card-body p-5">
                    <form action="/admin/update/{{ $inovasi->id }}" method="POST" enctype="multipart/form-data" id="formUpdate">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Nama TK</label>
                            <input type="text" name="nama_tk" class="form-control" value="{{ $inovasi->nama_tk }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">NPSN Sekolah</label>
                            <input type="text" name="npsn" class="form-control" value="{{ $inovasi->npsn }}" placeholder="Masukkan 8 digit NPSN" maxlength="8">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Guru Penanggung Jawab</label>
                            <div id="guru-container-edit">
                                @php
                                    $daftar_guru = is_array($inovasi->nama_guru) ? $inovasi->nama_guru : [$inovasi->nama_guru];
                                @endphp

                                @foreach($daftar_guru as $guru)
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" style="border-radius: 20px 0 0 20px; border: 2px solid #ede9fe; border-right: none;">
                                            <i class="fas fa-chalkboard-teacher" style="color: #8b5cf6;"></i>
                                        </span>
                                        <input type="text" name="nama_guru[]" class="form-control" value="{{ $guru }}" required style="border-radius: 0 20px 20px 0; border: 2px solid #ede9fe; border-left: none;">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="tambahGuruEdit()" class="btn btn-outline-primary btn-sm btn-tambah-guru px-3">
                                <i class="fas fa-plus me-1"></i> Tambah Guru
                            </button>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Judul Inovasi</label>
                            <input type="text" name="judul_inovasi" class="form-control" value="{{ $inovasi->judul_inovasi }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Deskripsi Karya</label>
                            <textarea name="deskripsi" class="form-control" rows="4" style="border-radius: 25px;">{{ $inovasi->deskripsi }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Link PPT (Google Drive)</label>
                            <input type="url" name="link_ppt" class="form-control" value="{{ $inovasi->link_ppt }}" placeholder="https://drive.google.com/...">
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block">Foto Saat Ini</label>
                            <div class="d-flex flex-wrap mb-2 ms-2">
                                @php
                                    $fotos = is_array($inovasi->foto) ? $inovasi->foto : [$inovasi->foto];
                                @endphp
                                @foreach($fotos as $f)
                                    <img src="{{ asset('uploads/'.$f) }}" class="preview-old-img mb-2 shadow-sm">
                                @endforeach
                            </div>
                            <label class="form-label mt-2">Ganti Foto Baru (Bisa banyak)</label>
                            <input type="file" name="foto[]" class="form-control" multiple>
                            <small class="text-muted ms-3">*Kosongkan jika tidak ingin mengganti foto</small>
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" id="btnSubmit" class="btn btn-update">
                                <span id="btnText"><i class="fas fa-save me-2"></i>Simpan Perubahan</span>
                                <span id="btnLoading" class="d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    Lagi proses simpan... 🚀
                                </span>
                            </button>
                            <a href="/admin/dashboard" class="btn btn-link text-muted mt-2 text-decoration-none text-center">Batal & Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function tambahGuruEdit() {
        const container = document.getElementById('guru-container-edit');
        const div = document.createElement('div');
        div.className = 'input-group mb-2 animate__animated animate__fadeInDown';
        div.innerHTML = `
            <span class="input-group-text" style="border-radius: 20px 0 0 20px; border: 2px solid #ede9fe; border-right: none;">
                <i class="fas fa-chalkboard-teacher" style="color: #8b5cf6;"></i>
            </span>
            <input type="text" name="nama_guru[]" class="form-control" required placeholder="Nama Guru Baru" style="border-radius: 0 20px 20px 0; border: 2px solid #ede9fe; border-left: none;">
        `;
        container.appendChild(div);
    }

    const form = document.getElementById('formUpdate');
    const btn = document.getElementById('btnSubmit');
    const textNormal = document.getElementById('btnText');
    const textLoading = document.getElementById('btnLoading');

    form.addEventListener('submit', function() {
        textNormal.classList.add('d-none');
        textLoading.classList.remove('d-none');
        btn.style.pointerEvents = 'none';
        btn.style.opacity = '0.8';
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
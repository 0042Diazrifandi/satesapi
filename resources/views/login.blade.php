<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sate Sapi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            /* Background gradient ungu mewah senada dengan sidebar admin */
            background: linear-gradient(135deg, #581c87 0%, #7c3aed 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 30px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            font-weight: 800;
            color: #581c87;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 15px;
            padding: 12px 20px 12px 45px;
            border: 2px solid #ede9fe;
            background-color: #f8fafc;
            transition: all 0.3s;
            font-weight: 600;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.15);
            background-color: white;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a855f7;
            font-size: 1.2rem;
            z-index: 10;
        }

        .btn-login {
            background: #8b5cf6;
            color: white;
            border-radius: 50px;
            font-weight: 800;
            border: none;
            padding: 12px;
            width: 100%;
            box-shadow: 0 4px 0 #6d28d9;
            transition: 0.3s;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #7c3aed;
            color: white;
            transform: translateY(2px);
            box-shadow: 0 2px 0 #6d28d9;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #581c87;
        }
    </style>
</head>
<body>

    <div class="login-card animate__animated animate__zoomIn">
        
        <div class="login-header">
            <!-- Icon/Logo (Bisa diganti sama logo asli Sate Sapi kalau ada) -->
            <div class="mb-3 d-inline-block p-3 rounded-circle" style="background-color: #ede9fe; color: #7c3aed;">
                <i class="fas fa-rocket fa-2x"></i>
            </div>
            <h2>SATE SAPI</h2>
            <p class="text-muted">Silakan login untuk masuk ke sistem.</p>
        </div>

        <!-- Notifikasi jika sukses (misal habis logout) -->
        @if(session('success'))
            <div class="alert alert-success rounded-4 text-center border-0 p-2" style="background-color: #dcfce7; color: #166534;">
                <small><i class="fas fa-check-circle me-1"></i> {{ session('success') }}</small>
            </div>
        @endif

        <!-- Notifikasi jika error/salah password -->
        @if ($errors->any())
            <div class="alert alert-danger rounded-4 text-center border-0 p-2" style="background-color: #fee2e2; color: #991b1b;">
                <ul class="mb-0 ps-0" style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li><small><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</small></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="input-group-custom">
                <i class="fas fa-user input-icon"></i>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autocomplete="off">
            </div>

            <div class="input-group-custom">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-login">
                Masuk <i class="fas fa-sign-in-alt ms-1"></i>
            </button>

        </form>

        <a href="/" class="back-link">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>

</body>
</html>
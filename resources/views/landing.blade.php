<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sate Sapi - Dunia Inovasi TK</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #7c3aed 0%, #4c1d95 100%);
            height: 100vh;
            overflow: hidden;
            position: relative;
        }
        
       
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.15); /* Dibuat agak transparan */
            border-radius: 100px;
            animation: moveClouds 20s linear infinite;
        }
        .cloud::after, .cloud::before {
            content: '';
            position: absolute;
            background: inherit; 
            border-radius: 100px;
        }
        .cloud-1 { width: 100px; height: 40px; top: 10%; left: 10%; animation-duration: 25s; }
        .cloud-1::after { width: 50px; height: 50px; top: -25px; left: 15px; }
        .cloud-1::before { width: 40px; height: 40px; top: -15px; left: 50px; }

        .cloud-2 { width: 150px; height: 60px; top: 20%; right: 15%; animation-duration: 30s; animation-direction: reverse; }
        .cloud-2::after { width: 80px; height: 80px; top: -40px; left: 20px; }
        .cloud-2::before { width: 60px; height: 60px; top: -20px; left: 80px; }

        .cloud-3 { width: 120px; height: 50px; bottom: 15%; left: 20%; animation-duration: 20s; }
        .cloud-3::after { width: 60px; height: 60px; top: -30px; left: 15px; }

        @keyframes moveClouds {
            0% { transform: translateX(-50px); }
            50% { transform: translateX(50px); }
            100% { transform: translateX(-50px); }
        }

        .main-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            z-index: 10;
        }
        
        .judul-app {
            font-size: 5rem;
            font-weight: 800;
            color: #ffffff;
            text-shadow: 4px 4px 0px #3b0764; 
            margin-bottom: 0;
            letter-spacing: 2px;
        }
        
        .sub-judul {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ede9fe; /* Ungu Sangat Muda */
            margin-bottom: 50px;
        }
        
        .btn-mulai {
            background-color: #ffffff; /* Tombol Putih */
            color: #7c3aed; /* Teks Ungu */
            border: 4px solid #ede9fe;
            padding: 15px 50px;
            font-size: 1.8rem;
            font-weight: 800;
            border-radius: 50px;
            box-shadow: 0 10px 0px #c4b5fd;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-mulai:hover {
            background-color: #ede9fe;
            color: #581c87;
            transform: translateY(3px);
            box-shadow: 0 7px 0px #c4b5fd;
        }
        .btn-mulai:active {
            transform: translateY(10px);
            box-shadow: 0 0px 0px #c4b5fd;
        }
        
        .icon-gede {
            font-size: 7rem;
            color: #feca57; /* Aksen Kuning Emas biar Mewah */
            margin-bottom: 20px;
            display: block;
            text-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

      
        @media (max-width: 768px) {
            .judul-app {
                font-size: 3.5rem;
                text-shadow: 3px 3px 0px #3b0764;
            }
            .sub-judul {
                font-size: 1.1rem;
                margin-bottom: 35px;
                padding: 0 15px;
            }
            .icon-gede {
                font-size: 5rem;
                margin-bottom: 10px;
            }
            .btn-mulai {
                font-size: 1.3rem;
                padding: 12px 35px;
                border-width: 3px;
                box-shadow: 0 8px 0px #c4b5fd;
            }
            .btn-mulai:hover {
                box-shadow: 0 5px 0px #c4b5fd;
            }
            .btn-mulai:active {
                transform: translateY(8px);
            }
        }
    </style>
</head>
<body>
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>

    <div class="container main-container">
        <div>
            <i class="fas fa-cubes icon-gede animate__animated animate__bounceInDown"></i>
            <h1 class="judul-app animate__animated animate__rubberBand animate__delay-1s">SaTe SaPi</h1>
            <p class="sub-judul animate__animated animate__fadeIn animate__delay-1s">Satu TeKa Satu Pembuatan Inovasi</p>
            
            <a href="/galeri" class="btn-mulai animate__animated animate__pulse animate__infinite">
                Ayo Mulai! <i class="fas fa-rocket ms-2"></i>
            </a>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>
</html>
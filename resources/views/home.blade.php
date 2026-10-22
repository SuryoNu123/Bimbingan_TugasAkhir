<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Jadwal Bimbingan</title>


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5f5f5;
        }

        /* NAVBAR */
        .navbar {
            background-color: #14274E;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .navbar .left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar img {
            width: 45px;
            height: 45px;
        }

        .navbar h1 {
            font-size: 18px;
            font-weight: 600;
        }

        .navbar h1 span {
            color: orange;
        }

        .navbar .right a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .hero {
            position: relative;
            height: 90vh;
            background: url("{{ asset('images/bg.jpg') }}") center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
        }

        .hero-content {
            position: relative;
            text-align: center;
            color: white;
            max-width: 800px;
        }

        .hero-content h2 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .hero-content p {
            font-size: 20px;
            font-weight: 300;
        }

        @media(max-width: 768px){
            .hero-content h2 {
                font-size: 24px;
            }

            .hero-content p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="left">
            <img src="{{ asset('images/Politeknik_Negeri_Cilacap.png') }}" alt="Logo">
            <h1>SISTEM JADWAL BIMBINGAN <span>PNC</span></h1>
        </div>
        <div class="right">
            <a href="/login">LOGIN</a>
        </div>
    </div>

    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h2>Selamat Datang di Sistem Jadwal Bimbingan PNC</h2>
            <p>The Ultimate Guide to Universities Worldwide</p>
        </div>
    </section>

</body>
</html>
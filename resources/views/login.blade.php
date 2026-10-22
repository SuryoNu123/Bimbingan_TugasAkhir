<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

        .card {
            position: relative;
            z-index: 2;
            background: #eeeeee;
            width: 350px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .card-header {
            background: #14274E;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
            font-weight: 600;
        }

        .card-body {
            padding: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input {
            width: 95%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background: #cfcfcf;
        }

        .form-group {
            margin-bottom: 25px;
        }

        button {
            width: 60%;
            margin: 10px auto 0;
            display: block;
            padding: 10px;
            background: #14274E;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
        }

        button:hover {
            background: #0f1d3a;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
        }


        @media(max-width: 768px){
            .card {
                width: 90%;
            }

            input {
                width: 100%;
            }

            button {
                width: 100%;
            }
        }

        .register-link{
            margin-top:15px;
            text-align:center;
            font-size:14px;
            color:#555;
        }

        .register-link a{
            color:#14274E;
            text-decoration:none;
            font-weight:600;
        }

        .register-link a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="left">
        <img src="{{ asset('images/Politeknik_Negeri_Cilacap.png') }}">
        <h1>SISTEM JADWAL BIMBINGAN <span>PNC</span></h1>
    </div>
</div>

<div class="hero">
    <div class="overlay"></div>

    <form class="card" method="POST" action="/login">
        @csrf

        <div class="card-header">Login</div>

        <div class="card-body">

            <div class="form-group">
                <label>NIM :</label>
                <input type="text" name="nim" required>
            </div>

            <div class="form-group">
                <label>Password :</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Login</button>

            <div class="register-link">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar</a>
            </div>


            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

        </div>
    </form>
</div>

</body>
</html>
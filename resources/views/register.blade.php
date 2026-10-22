<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f5f5f5;
        }

        .navbar{
            background:#14274E;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 40px;
        }

        .navbar .left{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .navbar img{
            width:45px;
            height:45px;
        }

        .navbar h1{
            font-size:18px;
            font-weight:600;
        }

        .navbar span{
            color:orange;
        }

        .hero{
            position:relative;
            height:90vh;
            background:url("{{ asset('images/bg.jpg') }}") center/cover no-repeat;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .overlay{
            position:absolute;
            width:100%;
            height:100%;
            background:rgba(0,0,0,.3);
        }

        .card{
            position:relative;
            z-index:2;
            width:360px;
            background:#eeeeee;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,.2);
        }

        .card-header{
            background:#14274E;
            color:white;
            text-align:center;
            padding:15px;
            font-size:22px;
            font-weight:600;
        }

        .card-body{
            padding:25px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:500;
        }

        input{
            width:100%;
            padding:10px;
            border:none;
            border-radius:8px;
            background:#cfcfcf;
        }

        .btn-daftar{
            width:100%;
            padding:10px;
            border:none;
            border-radius:8px;
            background:#14274E;
            color:white;
            font-weight:600;
            cursor:pointer;
        }

        .btn-daftar:hover{
            background:#0f1d3a;
        }

        .login-link{
            margin-top:15px;
            text-align:center;
        }

        .login-link a{
            color:#14274E;
            text-decoration:none;
            font-weight:600;
        }

        .error{
            color:red;
            margin-top:10px;
            text-align:center;
        }

        @media(max-width:768px){

            .card{
                width:90%;
            }

        }

    </style>
</head>
<body>

<div class="navbar">

    <div class="left">

        <img src="{{ asset('images/Politeknik_Negeri_Cilacap.png') }}">

        <h1>
            SISTEM JADWAL BIMBINGAN
            <span>PNC</span>
        </h1>

    </div>

</div>

<div class="hero">

    <div class="overlay"></div>

    <form class="card"
          action="{{ route('register.store') }}"
          method="POST">

        @csrf

        <div class="card-header">
            Daftar
        </div>

        <div class="card-body">

            <div class="form-group">

                <label>NIM :</label>

                <input
                    type="text"
                    name="nim"
                    required>

            </div>

            <div class="form-group">

                <label>Password :</label>

                <input
                    type="password"
                    name="password"
                    required>

            </div>

            <div class="form-group">

                <label>Konfirmasi Password :</label>

                <input
                    type="password"
                    name="password_confirmation"
                    required>

            </div>

            <button
                type="submit"
                class="btn-daftar">

                Daftar

            </button>

            <div class="login-link">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

            @if(session('error'))

                <div class="error">

                    {{ session('error') }}

                </div>

            @endif

        </div>

    </form>

</div>

</body>
</html>
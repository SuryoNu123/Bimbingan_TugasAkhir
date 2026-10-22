<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
        }

        .topbar {
            background: #1f3a63;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            color: white;
            position: fixed; 
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .topbar img {
            width: 45px;
            margin-right: 10px;
        }

        .topbar span {
            color: orange;
            font-weight: 600;
        }

        .sidebar {
                position: fixed;
                top: 0; 
                left: 0;
                width: 240px;
                height: 100vh;
                background: #ffffff;
                padding: 90px 20px 20px; 
                border-right: 1px solid #eee;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #444;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #1f3a63;
            color: white;
        }

        .content {
            margin-left: 260px;
            margin-top: 90px;
            padding: 25px;
        }

        .card-box {
            background: white;
            border-radius: 15px;
            padding: 20px;
            border: 1px solid #eee;
        }

        .mini-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mini-icon {
            background: #eef3ff;
            padding: 10px;
            border-radius: 10px;
        }

        .status {
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .complete { background: #e0ebff; color: #2a5bd7; }
        .ongoing { background: #fff3cd; color: #b78100; }
        .pending { background: #ffe0b3; color: #b75b00; }

    </style>
</head>

<body>

<div class="topbar">
    <div class="d-flex align-items-center">
        <img src="{{ asset('images/Politeknik_Negeri_Cilacap.png') }}">
        <div>
            <b>SISTEM JADWAL BIMBINGAN <span>PNC</span></b>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3">
        <i class="bi bi-bell fs-5"></i>
        <a href="/logout" class="text-white text-decoration-none">LOGOUT</a>
    </div>
</div>

<div class="sidebar">

    <a href="{{ route('dashboard') }}"
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door-fill"></i>
        Dashboard
    </a>

    <a href="{{ route('mahasiswa.index') }}"
       class="{{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
        <i class="bi bi-people-fill"></i>
        Data Mahasiswa
    </a>

    <a href="{{ route('dosen.index') }}"
       class="{{ request()->routeIs('dosen.*') ? 'active' : '' }}">
        <i class="bi bi-person-badge-fill"></i>
        Data Dosen
    </a>

    <a href="{{ route('jadwal.index') }}"
       class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
        <i class="bi bi-calendar-event-fill"></i>
        Jadwal Bimbingan
    </a>

    <a href="{{ route('catatan.index') }}"
       class="{{ request()->routeIs('catatan.*') ? 'active' : '' }}">
        <i class="bi bi-journal-text"></i>
        Catatan Bimbingan
    </a>

    <a href="{{ route('pengajuan.index') }}"
       class="{{ request()->routeIs('pengajuan.*') ? 'active' : '' }}">
        <i class="bi bi-pencil-square"></i>
        Pengajuan Bimbingan
    </a>

</div>


<div class="content">
    @yield('content')
</div>

</body>
</html>
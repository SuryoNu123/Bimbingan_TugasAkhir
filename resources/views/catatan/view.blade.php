@extends('layouts.dashboard')

@section('title', 'Detail Catatan Bimbingan')

@section('content')

<style>

.detail-card{
    background:white;
    border:1px solid #e5e7eb;
    border-radius:15px;
    overflow:hidden;
}

.detail-header{
    padding:20px;
    font-size:22px;
    font-weight:600;
    border-bottom:1px solid #e5e7eb;
}

.detail-body{
    padding:30px;
    min-height:450px;
}

.detail-body p{
    margin-bottom:8px;
}

.btn-kembali{
    background:#1f3a63;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    font-weight:500;
}

.btn-kembali:hover{
    color:white;
    background:#18304f;
}

.footer-btn{
    display:flex;
    justify-content:flex-end;
    margin-top:20px;
}

</style>

<div class="detail-card">

    <div class="detail-header">
        Catatan Bimbingan
    </div>

    <div class="detail-body">

        <p><strong>Tanggal:</strong> 10 Februari 2027</p>

        <p>
            <strong>Dosen Pembimbing:</strong>
            Fajar Mahardika, S.Kom., M.Kom.
        </p>

        <p>
            <strong>Mahasiswa:</strong>
            Suryo Nugroho
        </p>

        <br>

        <strong>Catatan:</strong>

        <ul>
            <li>
                Perbaiki latar belakang dengan menambahkan data
                pendukung terbaru (minimal 5 tahun terakhir)
            </li>

            <li>
                Rumusan masalah masih terlalu umum,
                buat lebih spesifik dan terarah
            </li>

            <li>
                Tambahkan referensi jurnal pada bagian
                tinjauan pustaka
            </li>

            <li>
                Perbaiki penulisan sesuai kaidah EYD
            </li>
        </ul>

        <p>
            <strong>Status:</strong>
            Revisi
        </p>

    </div>

</div>

<div class="footer-btn">

    <a href="{{ route('catatan.index') }}"
       class="btn-kembali">

        Kembali

    </a>

</div>

@endsection
@extends('layouts.dashboard')

@section('title', 'Catatan Bimbingan')

@section('content')

<style>
    .catatan-card{
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 15px;
        overflow: hidden;
    }

    .catatan-header{
        padding: 20px;
        font-size: 22px;
        font-weight: 600;
        border-bottom: 1px solid #e5e7eb;
    }

    .catatan-item{
        margin: 20px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
    }

    .catatan-left{
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .icon-revisi{
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #ffe1e1;
        color: #ff3b30;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .icon-setuju{
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #d8f5df;
        color: #22c55e;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .judul-catatan{
        font-weight: 500;
        color: #1f2937;
    }

    .nama-dosen{
        color: #6b7280;
        font-size: 14px;
    }

    .tanggal{
        color: #9ca3af;
        font-size: 13px;
    }

    .btn-view{
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }

    .btn-view:hover{
        text-decoration: underline;
    }
</style>

<div class="catatan-card">

    <div class="catatan-header">
        Catatan Bimbingan
    </div>

    <!-- Catatan 1 -->
    <div class="catatan-item">
        <div class="catatan-left">
            <div class="icon-revisi">
                <i class="bi bi-exclamation-circle-fill"></i>
            </div>

            <div>
                <div class="judul-catatan">Revisi</div>
                <div class="nama-dosen">
                    Fajar Mahardika, S.Kom., M.Kom.
                </div>
                <div class="tanggal">
                    February 10, 2027
                </div>
            </div>
        </div>

        <a href="{{ route('catatan.view', 1) }}" class="btn-view">View</a>
    </div>

    <!-- Catatan 2 -->
    <div class="catatan-item">
        <div class="catatan-left">
            <div class="icon-revisi">
                <i class="bi bi-exclamation-circle-fill"></i>
            </div>

            <div>
                <div class="judul-catatan">Revisi</div>
                <div class="nama-dosen">
                    Fajar Mahardika, S.Kom., M.Kom.
                </div>
                <div class="tanggal">
                    February 5, 2027
                </div>
            </div>
        </div>

        <a href="{{ route('catatan.view', 2) }}" class="btn-view">View</a>
    </div>

    <!-- Catatan 3 -->
    <div class="catatan-item">
        <div class="catatan-left">
            <div class="icon-setuju">
                <i class="bi bi-check-lg"></i>
            </div>

            <div>
                <div class="judul-catatan">
                    Persetujuan Judul
                </div>
                <div class="nama-dosen">
                    Fajar Mahardika, S.Kom., M.Kom.
                </div>
                <div class="tanggal">
                    February 1, 2027
                </div>
            </div>
        </div>

        <a href="#" class="btn-view">View</a>
    </div>

</div>

@endsection
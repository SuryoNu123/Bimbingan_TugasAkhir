@extends('layouts.dashboard')

@section('title', 'Pengajuan Bimbingan')

@section('content')

<style>
    .pengajuan-card{
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        overflow: hidden;
    }

    .pengajuan-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .pengajuan-header h6{
        margin: 0;
        font-weight: 600;
    }

    .search-btn{
        background: #f3f4f6;
        border: none;
        padding: 5px 15px;
        border-radius: 8px;
        font-size: 13px;
        color: #555;
    }

    .table{
        margin-bottom: 0;
    }

    .table thead{
        background: #f8f9fa;
    }

    .table thead th{
        font-size: 12px;
        color: #6b7280;
        font-weight: 500;
        border: none;
    }

    .table td{
    vertical-align: middle;
    font-size: 13px;
    border-color: #ececec;
    padding-top: 18px;
    padding-bottom: 18px;
    }

    .table th{
        padding-top: 14px;
        padding-bottom: 14px;
    }

    .status{
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-setuju{
        background: #d8f5df;
        color: #28a745;
    }

    .status-tolak{
        background: #ffd6d6;
        color: #dc3545;
    }

    .status-pending{
        background: #fff1c2;
        color: #c58a00;
    }

    .btn-area{
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
    }

    .btn-bimbingan{
        background: #1f3a63;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
    }

    .btn-bimbingan:hover{
        color: white;
        background: #18304f;
    }
</style>

<h2 class="fw-bold mb-3">
    Pengajuan Bimbingan
</h2>

<div class="pengajuan-card">

    <div class="pengajuan-header">
        <h6>Pengajuan Bimbingan</h6>

        <button class="search-btn">
            <i class="bi bi-funnel-fill"></i>
            Search
        </button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Dosen</th>
                <th>Topik</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @forelse($pengajuans as $pengajuan)

        <tr>

            <td>
                {{ $pengajuan->mahasiswa->nama }}
            </td>

            <td>
                {{ $pengajuan->dosen->nama }}
            </td>

            <td>
                {{ $pengajuan->topik }}
            </td>

            <td>
                {{ \Carbon\Carbon::parse($pengajuan->tanggal)->translatedFormat('d F Y') }}
            </td>

            <td>

                @if($pengajuan->status == 'Disetujui')

                    <span class="status status-setuju">
                        Disetujui
                    </span>

                @elseif($pengajuan->status == 'Ditolak')

                    <span class="status status-tolak">
                        Ditolak
                    </span>

                @else

                    <span class="status status-pending">
                        Pending
                    </span>

                @endif

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="5" class="text-center py-4">
                Belum ada pengajuan bimbingan
            </td>
        </tr>

        @endforelse

        </tbody>
    </table>

</div>

<div class="btn-area">

    <a href="{{ route('pengajuan.ajukan') }}"
   class="btn-bimbingan">

        <i class="bi bi-plus-lg"></i>
        Ajukan Bimbingan

    </a>

    <a href="{{ route('pengajuan.riwayat') }}"
    class="btn-bimbingan">

        <i class="bi bi-file-earmark-text-fill"></i>
        Riwayat Bimbingan

    </a>

</div>

@endsection
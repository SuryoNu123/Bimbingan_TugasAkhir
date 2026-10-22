@extends('layouts.dashboard')

@section('title','Riwayat Pengajuan Bimbingan')

@section('content')

<style>

.page-title{
    font-size:22px;
    font-weight:700;
    color:#1f2937;
    margin-bottom:2px;
}

.page-subtitle{
    font-size:13px;
    color:#6b7280;
    margin-bottom:20px;
}

.table-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:10px;
    overflow:hidden;
}

.table{
    margin-bottom:0;
}

.table thead th{
    background:#f8fafc;
    color:#6b7280;
    font-size:12px;
    font-weight:500;
    padding:12px 16px;
    border-bottom:1px solid #e5e7eb;
}

.table tbody td{
    padding:14px 16px;
    font-size:13px;
    color:#374151;
    vertical-align:middle;
}

.table tbody tr{
    border-bottom:1px solid #f1f5f9;
}

.table tbody tr:last-child{
    border-bottom:none;
}

.nama-dosen{
    font-weight:600;
    color:#111827;
}

.status{
    display:inline-block;
    padding:5px 14px;
    border-radius:999px;
    font-size:11px;
    font-weight:600;
}

.disetujui{
    background:#DCFCE7;
    color:#15803D;
}

.pending{
    background:#FEF3C7;
    color:#B45309;
}

.ditolak{
    background:#FEE2E2;
    color:#DC2626;
}

.aksi{
    white-space:nowrap;
}

.aksi i{
    font-size:14px;
    margin-right:10px;
    cursor:pointer;
}

.lihat{
    color:#2563eb;
}

.edit{
    color:#16a34a;
}

.hapus{
    color:#ef4444;
}

.btn-kembali{
    background:#1f3a63;
    color:white;
    border-radius:10px;
    padding:10px 20px;
    text-decoration:none;
    font-size:14px;
    font-weight:500;
}

.btn-kembali:hover{
    color:white;
    background:#18304f;
}

</style>

<h2 class="page-title">
    Riwayat Pengajuan Bimbingan
</h2>

<div class="page-subtitle">
    Lihat dan kelola pengajuan bimbingan Anda
</div>

<div class="table-card">

    <table class="table">

        <thead>
            <tr>
                <th>Dosen Pembimbing</th>
                <th>Topik</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($riwayats as $riwayat)

        <tr>

            <td>
                <span class="nama-dosen">
                    {{ $riwayat->dosen->nama }}
                </span>
            </td>

            <td>
                {{ $riwayat->topik }}
            </td>

            <td>
                {{ \Carbon\Carbon::parse($riwayat->tanggal)->translatedFormat('d M Y') }}
            </td>

            <td>
                {{ \Carbon\Carbon::parse($riwayat->waktu)->format('H:i') }}
            </td>

            <td>

                @if($riwayat->status == 'Disetujui')

                    <span class="status disetujui">
                        Disetujui
                    </span>

                @elseif($riwayat->status == 'Ditolak')

                    <span class="status ditolak">
                        Ditolak
                    </span>

                @else

                    <span class="status pending">
                        Pending
                    </span>

                @endif

            </td>

            <td class="aksi">

                <a href="{{ route('catatan.view',$riwayat->id) }}">
                    <i class="bi bi-eye-fill lihat"></i>
                </a>

                @if($riwayat->status=='Pending')

                    <a href="{{ route('pengajuan.edit',$riwayat->id) }}">
                        <i class="bi bi-pencil-square edit"></i>
                    </a>

                    <form action="{{ route('pengajuan.destroy',$riwayat->id) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                style="border:none;background:none;padding:0;"
                                onclick="return confirm('Yakin ingin menghapus?')">

                            <i class="bi bi-trash-fill hapus"></i>

                        </button>

                    </form>

                @endif

            </td>
        </tr>

        @empty

        <tr>

            <td colspan="6" class="text-center py-4">

                Belum ada riwayat pengajuan bimbingan

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

<div class="text-end mt-3">

    <a href="{{ route('pengajuan.index') }}"
       class="btn-kembali">
        Kembali
    </a>

</div>

@endsection
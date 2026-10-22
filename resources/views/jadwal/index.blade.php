@extends('layouts.dashboard')

@section('title', 'Jadwal Bimbingan')

@section('content')

<style>

.page-title{
    font-size:48px;
    font-weight:700;
    color:#374151;
    margin-bottom:15px;
}

.card-jadwal{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:14px;
    overflow:hidden;
}

.card-header-jadwal{
    display:flex;
    align-items:center;
    padding:20px 25px;
    border-bottom:1px solid #ececec;
}

.card-header-jadwal h5{
    margin:0;
    font-size:18px;
    font-weight:600;
}

.header-right{
    margin-left:auto;
    display:flex;
    align-items:center;
    gap:20px;
}

.semester{
    color:#8d96a8;
    font-size:14px;
}

.search-btn{
    border:none;
    background:#f3f4f6;
    border-radius:8px;
    padding:8px 15px;
    color:#4b5563;
    font-size:14px;
}

.table{
    margin-bottom:0;
}

.table thead{
    background:#f5f6f8;
}

.table thead th{
    border:none;
    color:#7b8495;
    font-size:13px;
    font-weight:600;
    padding:15px 18px;
}

.table tbody td{
    padding:18px;
    font-size:15px;
    color:#374151;
    border-top:1px solid #ececec;
}

.badge-complete{
    background:#dbeafe;
    color:#1d4ed8;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.badge-ongoing{
    background:#fef3c7;
    color:#b45309;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.status{
    padding:6px 16px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.complete{
    background:#dfe9ff;
    color:#2155d6;
}

.ongoing{
    background:#f8e8b8;
    color:#b57b00;
}

.pending{
    background:#ffe5d0;
    color:#d35400;
}

.table td{
    white-space: nowrap;
}

</style>

<h1 class="page-title">
    Jadwal Bimbingan
</h1>

<div class="card-jadwal">

    <div class="card-header-jadwal">

        <h5>Jadwal Bimbingan Hari Ini</h5>

        <div class="header-right">

            <span class="semester">
                Semester 6 - Fall 2027
            </span>

            <button class="search-btn">
                <i class="bi bi-funnel-fill"></i>
                Search
            </button>

        </div>

    </div>

    <table class="table">

        <thead>
            <tr>
                <th>Waktu</th>
                <th>Mahasiswa</th>
                <th>Dosen</th>
                <th>Topik</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($jadwals as $jadwal)

            <tr>

                <td>
                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}
                </td>

                <td>
                    {{ $jadwal->mahasiswa->nama }}
                </td>

                <td>
                    {{ $jadwal->dosen->nama }}
                </td>

                <td>
                    {{ $jadwal->topik }}
                </td>

                <td>

                    @if($jadwal->status == 'Complete')
                        <span class="status complete">Complete</span>

                    @elseif($jadwal->status == 'Ongoing')
                        <span class="status ongoing">Ongoing</span>

                    @elseif($jadwal->status == 'Pending')
                        <span class="status pending">Pending</span>

                    @else
                        <span class="status">
                            {{ $jadwal->status }}
                        </span>
                    @endif

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5" class="text-center">
                    Belum ada jadwal bimbingan
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>

</div>

@endsection
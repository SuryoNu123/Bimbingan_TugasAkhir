@extends('layouts.dashboard')

@section('title', 'Data Dosen')

@section('content')

<style>
.page-title{
    font-size:48px;
    font-weight:700;
    color:#3b4354;
    margin-bottom:20px;
}

.table-card{
    background:#fff;
    border:1px solid #e7e7e7;
    border-radius:18px;
    overflow:hidden;
}

.card-toolbar{
    display:flex;
    align-items:center;
    padding:18px 25px;
}

.table-title{
    font-size:20px;
    font-weight:600;
    margin:0;
}

.toolbar-right{
    margin-left:auto;
    display:flex;
    align-items:center;
    gap:18px;
}

.search-btn{
    border:none;
    background:#f3f4f8;
    padding:8px 18px;
    border-radius:10px;
    color:#495057;
}

.table{
    margin-bottom:0;
}

.table thead th{
    background:#fafafa;
    color:#8d95a5;
    font-size:14px;
    font-weight:600;
    border:none;
    padding:16px;
}

.table tbody td{
    padding:20px 16px;
    border-top:1px solid #ececec;
    font-size:16px;
    color:#374151;
}

.table tbody tr:hover{
    background:#fafafa;
}
</style>

<h1 class="page-title">Data Dosen</h1>

<div class="table-card">

    <div class="card-toolbar">

        <h5 class="table-title">Data Dosen</h5>

        <div class="toolbar-right">
            <button class="search-btn">
                <i class="bi bi-funnel-fill"></i>
                Search
            </button>
        </div>

    </div>

    <table class="table">

        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Bidang Keahlian</th>
                <th>NO HP</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>

            @forelse($dosens as $d)

            <tr>
                <td>{{ $d->nip }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->bidang_keahlian }}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ $d->email }}</td>
            </tr>

            @empty

            <tr>
                <td colspan="5" class="text-center py-4">
                    Belum ada data dosen
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
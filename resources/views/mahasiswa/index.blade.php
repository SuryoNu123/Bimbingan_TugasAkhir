@extends('layouts.dashboard')

@section('title', 'Data Mahasiswa')

@section('content')

<style>
.page-title{
    font-size:56px;
    font-weight:700;
    color:#3d4656;
    margin-bottom:18px;
}

.card-mahasiswa{
    background:#fff;
    border:1px solid #e6e8ed;
    border-radius:12px;
    overflow:hidden;
}

.card-header{
    background:#fff;
    padding:28px 30px;
    border-bottom:1px solid #eceff3;
}

.card-header h5{
    margin:0;
    font-size:34px;
    font-weight:600;
}

.card-toolbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:22px 25px;
}

.toolbar-right{
    margin-left:auto;     
    display:flex;
    align-items:center;
    gap:25px;
}

.semester{
    color:#8d96a8;
    font-size:16px;
}

.search-btn{
    background:#f3f4f6;
    border:none;
    border-radius:8px;
    padding:8px 18px;
    color:#4b5563;
    font-weight:500;
}

.table{
    margin:0;
}

.table-title{
    margin:0;
    font-size:20px;
    font-weight:600;
    color:#1f2937;
}

.table thead{
    background:#f6f7fa;
}

.table thead th{
    border:none;
    color:#8d96a8;
    font-size:14px;
    font-weight:600;
    padding:18px 22px;
}

.table tbody td{
    padding:22px;
    font-size:15px;
    color:#3b4253;
    border-top:1px solid #edf0f3;
}

.table tbody tr:hover{
    background:#fafbfd;
}

.btn-tambah{
    background:#18305e;
    color:#fff;
    border-radius:10px;
    padding:12px 20px;
    text-decoration:none;
    font-size:17px;
    font-weight:600;
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-tambah:hover{
    color:white;
    background:#14284f;
}

</style>

<h1 class="page-title">
    Data Mahasiswa
</h1>

<div class="card-mahasiswa">

    <div class="card-toolbar">

        <h5>Data Mahasiswa</h5>

        <div class="toolbar-right">

            <span class="semester">
                Semester 6 - Fall 2027
            </span>

            <button class="search-btn">
                <i class="bi bi-funnel-fill"></i>
                Search
            </button>

        </div>

    </div>

    <table class="table table-hover align-middle mb-0">

        <thead>

            <tr>

                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
                <th>No HP</th>
                <th>Email</th>
                <th width="120">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($mahasiswas as $m)

            <tr>

                <td>{{ $m->npm }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->prodi }}</td>
                <td>{{ $m->no_hp }}</td>
                <td>{{ $m->email }}</td>

                <td>

                    <a href="{{ route('mahasiswa.edit', $m->id) }}"
                       class="btn btn-success btn-sm">

                        <i class="bi bi-pencil-square"></i>

                    </a>

                    <form action="{{ route('mahasiswa.destroy', $m->id) }}"
                          method="POST"
                          style="display:inline-block;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center py-4">

                    Belum ada data mahasiswa

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<div class="text-end mt-4">

    <a href="{{ route('mahasiswa.create') }}" class="btn-tambah">

        <i class="bi bi-plus-lg"></i>

        Tambah Mahasiswa

    </a>

</div>

@endsection
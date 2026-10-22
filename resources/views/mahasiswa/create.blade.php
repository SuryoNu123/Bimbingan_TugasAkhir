@extends('layouts.dashboard')

@section('title','Mahasiswa')

@section('content')

<style>

.page-title{
    font-size:48px;
    font-weight:700;
    color:#374151;
    margin-bottom:20px;
}

.form-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:15px;
    overflow:hidden;
}

.form-header{
    padding:20px;
    border-bottom:1px solid #e5e7eb;
}

.form-header h4{
    margin:0;
    font-weight:600;
}

.form-body{
    padding:25px;
}

.form-label{
    font-weight:500;
    margin-bottom:8px;
    color:#374151;
}

.form-control{
    background:#f3f4f6;
    border:none;
    border-radius:8px;
    height:42px;
}

.form-control:focus{
    box-shadow:none;
    border:none;
    background:#eef1f5;
}

.btn-save{
    background:#1f3a63;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    font-weight:500;
}

.btn-save:hover{
    background:#18304f;
    color:white;
}

.footer-btn{
    display:flex;
    justify-content:flex-end;
    margin-top:25px;
}

</style>

<h1 class="page-title">

@if(isset($mahasiswa))

    Edit Mahasiswa

@else

    Tambah Mahasiswa

@endif

</h1>

<div class="form-card">

    <div class="form-header">

        <h4>Data Mahasiswa</h4>

    </div>

    <div class="form-body">

        @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        @if(isset($mahasiswa))

        <form action="{{ route('mahasiswa.update',$mahasiswa->id) }}"
              method="POST">

            @method('PUT')

        @else

        <form action="{{ route('mahasiswa.store') }}"
              method="POST">

        @endif

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    NIM
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="npm"
                    placeholder="Masukkan NIM"
                    value="{{ old('npm',$mahasiswa->npm ?? '') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="nama"
                    placeholder="Masukkan Nama Lengkap"
                    value="{{ old('nama',$mahasiswa->nama ?? '') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Program Studi
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="prodi"
                    placeholder="Masukkan Program Studi"
                    value="{{ old('prodi',$mahasiswa->prodi ?? '') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    NO HP
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="no_hp"
                    placeholder="Masukkan Nomor HP"
                    value="{{ old('no_hp',$mahasiswa->no_hp ?? '') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Masukkan Email"
                    value="{{ old('email',$mahasiswa->email ?? '') }}"
                    required>

            </div>

            <div class="footer-btn">

                <button type="submit" class="btn-save">

                    @if(isset($mahasiswa))

                        <i class="bi bi-pencil-fill"></i>
                        Update

                    @else

                        <i class="bi bi-floppy-fill"></i>
                        Save

                    @endif

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
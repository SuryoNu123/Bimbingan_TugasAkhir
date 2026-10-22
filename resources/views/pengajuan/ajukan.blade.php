@extends('layouts.dashboard')

@section('title','Ajukan Bimbingan')

@section('content')

<style>

.form-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:15px;
    padding:25px;
}

.form-title{
    font-size:42px;
    font-weight:700;
    color:#1f3a63;
}

.form-subtitle{
    color:#6b7280;
    margin-bottom:25px;
}

.btn-kirim{
    background:#1f3a63;
    color:white;
    border:none;
    border-radius:8px;
    padding:12px;
    width:100%;
    font-weight:600;
}

.btn-batal{
    background:white;
    border:1px solid #d1d5db;
    border-radius:8px;
    padding:12px;
    width:100%;
    font-weight:600;
}

textarea{
    resize:none;
}

</style>

<div class="form-card">

    <div class="form-title">

        @if(isset($pengajuan))

            Edit Pengajuan Bimbingan

        @else

            Ajukan Bimbingan

        @endif

    </div>

    <div class="form-subtitle">
        Lengkapi formulir di bawah ini untuk mengajukan jadwal bimbingan
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>
    @endif

    @if(isset($pengajuan))

        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">

            @method('PUT')

        @else

        <form action="{{ route('pengajuan.store') }}" method="POST">

        @endif

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Mahasiswa *
            </label>

            <input type="text"
                   class="form-control"
                   value="Suryo Nugroho"
                   readonly>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Pilih Dosen Pembimbing *
            </label>

            <select name="dosen_id"
                    class="form-control"
                    required>

                <option value="">Pilih Dosen</option>

                @foreach($dosens as $dosen)

                    <option value="{{ $dosen->id }}"
                        {{ (isset($pengajuan) && $pengajuan->dosen_id == $dosen->id) ? 'selected' : '' }}>

                        {{ $dosen->nama }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Topik Bimbingan *
            </label>

            <input type="text"
                name="topik"
                class="form-control"
                placeholder="Masukkan topik bimbingan"
                value="{{ old('topik', $pengajuan->topik ?? '') }}"
                required>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tanggal Bimbingan *
                </label>

                <input type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', $pengajuan->tanggal ?? '') }}"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Waktu Bimbingan *
                </label>

                <input type="time"
                    name="waktu"
                    class="form-control"
                    value="{{ old('waktu', $pengajuan->waktu ?? '') }}"
                    required>

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Deskripsi / Catatan Tambahan *
            </label>

            <textarea
                rows="6"
                name="deskripsi"
                class="form-control"
                placeholder="Jelaskan detail yang ingin dikonsultasikan..."
                required>{{ old('deskripsi', $pengajuan->deskripsi ?? '') }}</textarea>

        </div>

        <div class="row mt-4">

            <div class="col-md-6">

                <button type="submit" class="btn-kirim">

                @if(isset($pengajuan))

                    <i class="bi bi-pencil-fill"></i>
                    Update Pengajuan

                @else

                    <i class="bi bi-send-fill"></i>
                    Kirim Pengajuan

                @endif

                </button>

            </div>

            <div class="col-md-6">

                <a href="{{ route('pengajuan.riwayat') }}"
                   class="btn btn-batal w-100">

                    Batal

                </a>

            </div>

        </div>

    </form>

</div>

@endsection
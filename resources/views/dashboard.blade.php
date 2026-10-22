@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<h3 class="fw-bold">Selamat Datang, Suryo!</h3>
<p class="text-muted">Teknik Informatika - Semester 6</p>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card-box mini-card">
            <div>
                <small>Jumlah Mahasiswa</small>
                <h4 class="fw-bold">{{ $jumlahMahasiswa }}</h4>
            </div>
            <div class="mini-icon">
                <i class="bi bi-people-fill text-success"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box mini-card">
            <div>
                <small>Jumlah Dosen</small>
                <h4 class="fw-bold">{{ $jumlahDosen }}</h4>
            </div>
            <div class="mini-icon">
                <i class="bi bi-book-fill text-primary"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box mini-card">
            <div>
                <small>Jadwal Bimbingan</small>
                <h4 class="fw-bold">{{ $jumlahJadwal }}</h4>
            </div>
            <div class="mini-icon">
                <i class="bi bi-calendar-event-fill text-warning"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box mini-card">
            <div>
                <small>Pengajuan</small>
                <h4 class="fw-bold">{{ $jumlahPengajuan }}</h4>
            </div>
            <div class="mini-icon">
                <i class="bi bi-folder-fill text-info"></i>
            </div>
        </div>
    </div>

</div>

<div class="row g-3">
    <div class="col-md-8">
        <div class="card-box">
            <h5 class="fw-bold mb-3">Jadwal Bimbingan Hari Ini</h5>

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
                        <td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}</td>
                        <td>{{ $jadwal->mahasiswa->nama }}</td>
                        <td>{{ $jadwal->dosen->nama }}</td>
                        <td>{{ $jadwal->topik }}</td>

                        <td>
                            <span class="status
                                {{ strtolower($jadwal->status) }}">
                                {{ $jadwal->status }}
                            </span>
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">Belum ada jadwal bimbingan</td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box">
            <h5 class="fw-bold mb-4">
                Recent Pengajuan
            </h5>
            @forelse($recentPengajuan as $item)
                <div class="mb-4">

                    <strong>
                        {{ $item->mahasiswa->nama }}
                    </strong>

                    <br>

                    <small class="text-muted">
                        Mengajukan Bimbingan
                    </small>

                    <br>
                    @if($item->status=='Pending')

                        <span class="status pending">
                            Pending
                        </span>

                    @elseif($item->status=='Disetujui')

                        <span class="status complete">
                            Done
                        </span>

                    @else

                        <span class="status ongoing">
                            {{ $item->status }}
                        </span>

                    @endif

                </div>

            @empty

                <p class="text-center text-muted">

                    Belum ada pengajuan.

                </p>

            @endforelse

        </div>

    </div>

</div>

@endsection
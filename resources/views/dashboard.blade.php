@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <div class="card bg-emphasis-color text-danger mb-4">
            <div class="card-body">
                <h4 class="card-title fs-1 fw-bold mb-7">Selamat datang, {{ $username }}!</h4>
                <p class="card-text mt-5 fs-6">Kami senang Anda kembali ke Dashboard Manajemen Buku! Di sini, Anda dapat melihat koleksi buku yang Anda miliki, buku yang sudah Anda baca, dan buku yang sedang Anda baca. Semua informasi tentang buku-buku favorit Anda tersedia dengan mudah.</p>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <div style="width: 1000px;">
              <input type="text" class="form-control" placeholder="Cari judul buku...">
            </div>
        </div>

        <blockquote class="blockquote text-center mt-4">
            <p class="mb-0">“Buku adalah sihir yang unik dan mudah dibawa.”</p>
        </blockquote>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title">Koleksi Buku</h5>
                        <p class="card-text">Temukan semua buku yang Anda miliki dalam satu tempat. Mulai dari buku yang baru dibeli hingga buku yang sudah lama Anda simpan.</p>
                        <a href="{{ route('pengelolaan') }}" class="btn btn-danger btn-sm mb-2">Lihat Koleksi</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body bg-success text-white">
                        <h5 class="card-title">Sudah Dibaca</h5>
                        <p class="card-text">Lihat daftar buku yang telah selesai Anda baca. Bisa jadi referensi atau inspirasi untuk buku berikutnya.</p>
                        <a href="{{ route('riwayat') }}" class="btn btn-danger btn-sm mt-4">Lihat Riwayat</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body bg-warning text-white">
                        <h5 class="card-title">Sedang Dibaca</h5>
                        <p class="card-text">Cek buku yang sedang Anda nikmati saat ini dan lanjutkan petualangan membaca Anda!</p>
                        <a href="{{ route('sedangDibaca') }}" class="btn btn-danger btn-sm text-white mt-5">Lihat Progres</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 shadow-sm" style="max-width: 1100px; margin: 0 auto;">
        <div class="card-body bg-info">
            <h5 class="card-title">📖 Buku Terakhir Dibaca</h5>
            <p class="card-text"><strong>Judul:</strong> Hello, Cello!</p>
            <p class="card-text"><strong>Tanggal terakhir dibaca:</strong> 3 Mei 2025</p>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                    60%
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 shadow-sm" style="max-width: 1100px; margin: 0 auto;">
        <div class="card-body bg-emphasis">
            <h5 class="card-title">✅ Buku Terakhir Selesai Dibaca</h5>
            <p class="card-text"><strong>Judul:</strong> Atomic Habits</p>
            <p class="card-text"><strong>Tanggal selesai dibaca:</strong> 28 April 2025</p>
            <p class="card-text text-success"><strong>Status:</strong> Selesai dibaca</p>
        </div>
    </div>
@endsection

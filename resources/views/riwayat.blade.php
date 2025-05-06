@extends('layouts.app')

@section('title', 'Riwayat Buku')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📚 Riwayat Buku yang Telah Dibaca</h2>

    @if(count($riwayat) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $index => $buku)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $buku['judul'] }}</td>
                        <td>{{ $buku['pengarang'] }}</td>
                        <td>{{ $buku['tanggal'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning">
            Belum ada buku yang selesai dibaca.
        </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</div>
@endsection

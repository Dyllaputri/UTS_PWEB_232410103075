@extends('layouts.app')

@section('title', 'Buku yang Sedang Dibaca')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Buku yang Sedang Dibaca</h2>

    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#formTambahBuku">
        + Tambah Buku yang Akan Dibaca
    </button>

    <div class="collapse mb-4" id="formTambahBuku">
        <div class="card card-body">
            <form action="{{ route('tambahBukuSedangDibaca') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="total_halaman" class="form-label">Total Halaman</label>
                        <input type="number" name="total_halaman" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(count($sedangDibaca) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Total Halaman</th>
                        <th>Halaman Dibaca</th>
                        <th>Progress</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sedangDibaca as $index => $buku)
                    @php
                        $progress = ($buku['halaman_dibaca'] / $buku['total_halaman']) * 100;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $buku['judul'] }}</td>
                        <td>{{ $buku['pengarang'] }}</td>
                        <td>{{ $buku['total_halaman'] }}</td>
                        <td>{{ $buku['halaman_dibaca'] }}</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ round($progress) }}%
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="collapse" data-bs-target="#edit-{{ $index }}">Edit</button>
                        </td>
                    </tr>

                    <tr id="edit-{{ $index }}" class="collapse">
                        <td colspan="7">
                            <form method="POST" action="{{ route('updateProgress') }}">
                                @csrf
                                <input type="hidden" name="index" value="{{ $index }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="halaman_dibaca_{{ $index }}" class="form-label">Update Halaman Dibaca:</label>
                                        <input type="number" min="0" max="{{ $buku['total_halaman'] }}" name="halaman_dibaca" id="halaman_dibaca_{{ $index }}" class="form-control" value="{{ $buku['halaman_dibaca'] }}" required>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <button type="submit" class="btn btn-success mt-2">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning">
            Saat ini tidak ada buku yang sedang dibaca.
        </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Pengelolaan Buku')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Buku</h1>

        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#formTambahBuku">
                + Tambah Buku
            </button>
        </div>

        <div id="formTambahBuku" class="collapse mb-4">
            <div class="card card-body">
                <form method="POST" action="/pengelolaan">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-3">
                            <input type="text" name="judul" class="form-control" placeholder="Judul Buku" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="tahun" class="form-control" placeholder="Tahun" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="aksi" value="tambah" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(isset($editBuku))
        <div class="alert alert-warning">
            <form method="POST" action="/pengelolaan">
                @csrf
                <input type="hidden" name="id" value="{{ $editBuku['id'] }}">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="judul" class="form-control" value="{{ $editBuku['judul'] }}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="pengarang" class="form-control" value="{{ $editBuku['pengarang'] }}" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="tahun" class="form-control" value="{{ $editBuku['tahun'] }}" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="aksi" value="simpan" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
        @endif

        <form method="POST" action="/pengelolaan">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-sm bg-white">
                    <thead class="table-success text-center">
                        <tr>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Edit/Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataBuku as $buku)
                        <tr>
                            <td>{{ $buku['judul'] }}</td>
                            <td>{{ $buku['pengarang'] }}</td>
                            <td>{{ $buku['tahun'] }}</td>
                            <td class="text-center">
                                <button type="submit" name="aksi" value="edit-{{ $buku['id'] }}" class="btn btn-warning btn-sm">Edit</button>
                                <button type="submit" name="aksi" value="hapus-{{ $buku['id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus buku ini?')">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                        @if(count($dataBuku) === 0)
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada buku ditambahkan.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection

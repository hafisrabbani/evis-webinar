@extends('layout')
@section('title', 'Data Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Tambah Mahasiswa</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mahasiswas as $mhs)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->fakultas }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-primary me-2" href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

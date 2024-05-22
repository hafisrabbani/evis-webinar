@extends('layout')
@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Tambah Mahasiswa</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Terdapat kesalahan input. <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="card p-5">
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input type="text" class="form-control" id="fakultas" name="fakultas" value="{{ $mahasiswa->fakultas }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

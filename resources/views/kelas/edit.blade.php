@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kelas</h1>
    <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" value="{{ $kela->nama_kelas }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection

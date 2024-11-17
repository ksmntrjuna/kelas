@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Guru</h1>
    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $guru->nama }}" required>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ $guru->nip }}" required>
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control">
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ $k->id == $guru->kelas_id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
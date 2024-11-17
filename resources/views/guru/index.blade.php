@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Guru</h1>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <form action="{{ route('guru.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="kelas_id" class="form-control">
                    <option value="">-- Semua Kelas --</option>
                    @foreach ($kelas as $kls)
                    <option value="{{ $kls->id }}" {{ $kls->id == $kelas_id ? 'selected' : '' }}>
                        {{ $kls->nama_kelas }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $index => $guru)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $guru->nama }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->kelas->nama_kelas ?? '-' }}</td>
                <td>
                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
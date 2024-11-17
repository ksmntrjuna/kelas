@extends('layouts.app')

@section('title', 'Dashboard - Daftar Siswa, Kelas, dan Guru')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Siswa, Kelas, dan Guru</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Nama Guru</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->nama_kelas ?? 'Belum ada kelas' }}</td>
                <td>{{ $siswa->kelas->guru->nama ?? 'Belum ada wali kelas' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data siswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
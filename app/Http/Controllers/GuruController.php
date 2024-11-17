<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas_id = $request->input('kelas_id');
        $gurus = Guru::with('kelas');

        if ($kelas_id) {
            $gurus->where('kelas_id', $kelas_id);
        }

        $gurus = $gurus->get();
        $kelas = Kelas::all();

        return view('guru.index', compact('gurus', 'kelas', 'kelas_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all(); 
        return view('guru.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:gurus,nip|max:255',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        $kelas = Kelas::all();
        return view('guru.edit', compact('guru', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => "required|unique:gurus,nip,{$guru->id}|max:255",
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus.');
    }
}

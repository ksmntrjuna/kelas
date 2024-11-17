<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with(['kelas', 'kelas.guru'])->get();
        return view('dashboard.index', compact('siswas'));
    }

    
}

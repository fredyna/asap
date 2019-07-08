<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriUjian;

class ApiKategoriUjianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $kategori = [
            'data' => KategoriUjian::all()
        ];
        return response()->json($kategori);
    }
}

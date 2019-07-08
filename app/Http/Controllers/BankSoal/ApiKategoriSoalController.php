<?php

namespace App\Http\Controllers\BankSoal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriSoal;

class ApiKategoriSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $kategori = [
            'data' => KategoriSoal::all()
        ];
        return response()->json($kategori);
    }
}

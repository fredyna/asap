<?php

namespace App\Http\Controllers\BankSoal\Soal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soal;

class SoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('banksoal.soal.index');
    }

    public function create()
    {
        return view('banksoal.soal.create');
    }

    public function show($id)
    {
        return view('banksoal.soal.show');
    }
}

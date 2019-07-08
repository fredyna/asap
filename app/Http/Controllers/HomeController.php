<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Ujian;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data['count_soal'] = Soal::all()->count();
        $data['count_ujian'] = Ujian::all()->count();
        $data['count_peserta'] = User::where('role', 'member')->count();
        return view('home')->with($data);
    }
}

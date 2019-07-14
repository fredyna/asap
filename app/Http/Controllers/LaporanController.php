<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UjianUser;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data['laporans'] = UjianUser::latest()->paginate(10);
        return view('laporan.index')->with($data);
    }

    public function show($id)
    {
        $data['laporan'] = UjianUser::find($id);
        return view('laporan.show')->with($data);
    }
}

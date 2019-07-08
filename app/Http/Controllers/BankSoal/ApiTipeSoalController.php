<?php

namespace App\Http\Controllers\BankSoal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipesoal;

class ApiTipeSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $tipe = [
            'data' =>  Tipesoal::all()
        ];
        return response()->json($tipe);
    }
}

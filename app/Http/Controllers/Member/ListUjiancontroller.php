<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\Transformers\UjianUserTransformer;
use Illuminate\Support\Facades\DB;

class ListUjiancontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $ujians = Ujian::with('ujianUsers')
            ->with('soals')
            ->get();
        $data = fractal($ujians, new UjianUserTransformer(['user_id' => $request->user()->id]))->toArray();

        return view('member.ujian.index')->with($data);
    }
}

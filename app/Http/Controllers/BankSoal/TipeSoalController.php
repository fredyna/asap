<?php

namespace App\Http\Controllers\BankSoal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipesoal;
use Alert;

class TipeSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data['tipes']  = Tipesoal::all();
        return view('banksoal.tipe.index')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tipe'      => 'required|string'
        ]);

        $data = [
            'tipe'      => $request->tipe,
            'deskripsi' => $request->deskripsi
        ];

        Tipesoal::create($data) ?
            Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');

        return redirect()->back();
    }

    public function show($id)
    {
        $data['tipe'] = Tipesoal::findOrFail($id);
        return view('banksoal.tipe.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tipe'      => 'required|string'
        ]);

        $data = [
            'tipe'      => $request->tipe,
            'deskripsi' => $request->deskripsi
        ];

        $tipe = Tipesoal::find($id);

        $tipe->update($data) ?
            Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');

        return redirect()->route('tipe-soal.index');
    }

    public function destroy($id)
    {
        $tipe = Tipesoal::find($id);
        $tipe->delete() ?
            Alert::success('Success', 'Delete Data Success') : Alert::error('Failed', 'Delete Data Failed');

        return redirect()->back();
    }
}

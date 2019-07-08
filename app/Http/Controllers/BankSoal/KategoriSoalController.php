<?php

namespace App\Http\Controllers\BankSoal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriSoal;
use Alert;

class KategoriSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data['kategories']  = KategoriSoal::all();
        return view('banksoal.kategori.index')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori'      => 'required|string'
        ]);

        $data = [
            'kategori'      => $request->kategori,
            'deskripsi'     => $request->deskripsi
        ];

        KategoriSoal::create($data) ?
            Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');

        return redirect()->back();
    }

    public function show($id)
    {
        $data['kategori'] = KategoriSoal::findOrFail($id);
        return view('banksoal.kategori.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori'      => 'required|string'
        ]);

        $data = [
            'kategori'      => $request->kategori,
            'deskripsi'     => $request->deskripsi
        ];

        $kategori = KategoriSoal::find($id);

        $kategori->update($data) ?
            Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');

        return redirect()->route('kategori-soal.index');
    }

    public function destroy($id)
    {
        $kategori = KategoriSoal::find($id);
        $kategori->delete() ?
            Alert::success('Success', 'Delete Data Success') : Alert::error('Failed', 'Delete Data Failed');

        return redirect()->back();
    }
}

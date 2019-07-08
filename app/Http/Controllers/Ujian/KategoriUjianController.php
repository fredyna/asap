<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriUjian;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriUjianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data['kategories'] = KategoriUjian::all();
        return view('ujian.kategori.index')->with($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori'      => 'required|string'
        ]);

        $data = [
            'nama'      => $request->kategori,
            'deskripsi' => $request->deskripsi
        ];

        if (!empty($request->id)) {
            $kategori = KategoriUjian::find($request->id);
            $kategori->update($data) ?
                Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');

            return redirect()->route('kategori-ujian.index');
        } else {
            KategoriUjian::create($data) ?
                Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $data['kategori'] = KategoriUjian::findOrFail($id);
        return view('ujian.kategori.show')->with($data);
    }

    public function destroy($id)
    {
        $kategori = KategoriUjian::find($id);
        $kategori->delete() ?
            Alert::success('Success', 'Delete Data Success') : Alert::error('Failed', 'Delete Data Failed');

        return redirect()->back();
    }
}

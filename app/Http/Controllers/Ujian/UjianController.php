<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\KategoriUjian;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UjianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('ujian.ujian.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori'  => 'required',
            'nama'      => 'required|string'
        ]);

        $slug = Str::slug($request->nama);

        $data = [
            'kategori_ujian_id' => $request->kategori,
            'nama'     => $request->nama,
            'slug'     => $slug
        ];

        if (!empty($request->id)) {
            $ujian = Ujian::find($request->id);
            $ujian->update($data) ?
                Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');
        } else {
            Ujian::create($data) ?
                Alert::success('Success', 'Save Data Success') : Alert::error('Failed', 'Save Data Failed');
        }

        return redirect()->route('ujian.index');
    }

    public function create()
    {
        $data['kategories'] = KategoriUjian::all();
        return view('ujian.ujian.create')->with($data);
    }

    public function show($id)
    {
        $data['kategories'] = KategoriUjian::all();
        $data['ujian']      = Ujian::findOrFail($id);
        return view('ujian.ujian.show')->with($data);
    }

    public function edit($id)
    {
        $data['kategories'] = KategoriUjian::all();
        $data['ujian']      = Ujian::findOrFail($id);
        return view('ujian.ujian.edit')->with($data);
    }

    public function destroy($id)
    {
        $ujian = Ujian::find($id);
        $ujian->delete() ?
            Alert::success('Success', 'Delete Data Success') : Alert::error('Failed', 'Delete Data Failed');

        return redirect()->back();
    }
}

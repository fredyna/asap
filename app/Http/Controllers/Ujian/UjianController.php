<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\KategoriUjian;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Log;

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
            $data_log = [
                'user_id' => $request->user()->id,
                'name'  => 'Edit Ujian',
            ];

            $ujian = Ujian::find($request->id);
            if ($ujian->update($data)) {
                $data_log['description'] = 'Berhasil mengedit data ujian dengan id ' . $ujian->id;
                Alert::success('Success', 'Save Data Success');
            } else {
                $data_log['description'] = 'Gagal mengedit data ujian dengan id ' . $ujian->id;
                Alert::error('Failed', 'Save Data Failed');
            }
        } else {
            $data_log = [
                'user_id' => $request->user()->id,
                'name'  => 'Tambah Ujian',
            ];

            $ujian = Ujian::create($data);
            if ($ujian) {
                $data_log['description'] = 'Berhasil menambah data ujian';
                Alert::success('Success', 'Save Data Success');
            } else {
                $data_log['description'] = 'Gagal menambah data ujian';
                Alert::error('Failed', 'Save Data Failed');
            }
        }

        Log::create($data_log);
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

    public function destroy(Request $request, $id)
    {
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus Ujian',
        ];

        $ujian = Ujian::find($id);
        if ($ujian->delete()) {
            $data_log['description'] = 'Berhasil menghapus data ujian';
            Alert::success('Success', 'Delete Data Success');
        } else {
            $data_log['description'] = 'Gagal menghapus data ujian';
            Alert::error('Failed', 'Delete Data Failed');
        }

        Log::create($data_log);
        return redirect()->back();
    }
}

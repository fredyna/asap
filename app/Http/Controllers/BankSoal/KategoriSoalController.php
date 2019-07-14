<?php

namespace App\Http\Controllers\BankSoal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriSoal;
use Alert;
use App\Log;

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

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Tambah Kategori Soal',
        ];

        $kategori = KategoriSoal::create($data);
        if ($kategori) {
            $data_log['description'] = 'Berhasil menambah data kategori soal';
            Alert::success('Success', 'Save Data Success');
        } else {
            $data_log['description'] = 'Gagal menambah data kategori soal';
            Alert::error('Failed', 'Save Data Failed');
        }

        Log::create($data_log);
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

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Edit Kategori Soal',
        ];

        $kategori = KategoriSoal::find($id);
        if ($kategori->update($data)) {
            $data_log['description'] = 'Berhasil mengedit data kategori soal dengan id ' . $kategori->id;
            Alert::success('Success', 'Save Data Success');
        } else {
            $data_log['description'] = 'Gagal mengedit data kategori soal dengan id ' . $kategori->id;
            Alert::error('Failed', 'Save Data Failed');
        }

        Log::create($data_log);
        return redirect()->route('kategori-soal.index');
    }

    public function destroy(Request $request, $id)
    {
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus Kategori Soal',
        ];

        $kategori = KategoriSoal::find($id);
        if ($kategori->delete()) {
            $data_log['description'] = 'Berhasil menghapus data kategori soal dengan id ' . $kategori->id;
            Alert::success('Success', 'Delete Data Success');
        } else {
            $data_log['description'] = 'Gagal menghapus data kategori soal dengan id ' . $kategori->id;
            Alert::error('Failed', 'Delete Data Failed');
        }

        Log::create($data_log);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriUjian;
use RealRashid\SweetAlert\Facades\Alert;
use App\Log;

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
            $data_log = [
                'user_id' => $request->user()->id,
                'name'  => 'Edit Kategori Ujian',
            ];

            if ($kategori->update($data)) {
                $data_log['description'] = 'Berhasil mengedit data kategori ujian dengan id ' . $kategori->id;
                Alert::success('Success', 'Save Data Success');
            } else {
                $data_log['description'] = 'Gagal mengedit data kategori ujian dengan id ' . $kategori->id;
                Alert::error('Failed', 'Save Data Failed');
            }

            Log::create($data_log);
            return redirect()->route('kategori-ujian.index');
        } else {
            $kategori = KategoriUjian::create($data);
            $data_log = [
                'user_id' => $request->user()->id,
                'name'  => 'Tambah Kategori Ujian',
            ];

            if ($kategori) {
                $data_log['description'] = 'Berhasil menambah data kategori ujian';
                Alert::success('Success', 'Save Data Success');
            } else {
                $data_log['description'] = 'Gagal menambah data kategori ujian';
                Alert::error('Failed', 'Save Data Failed');
            }

            Log::create($data_log);
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $data['kategori'] = KategoriUjian::findOrFail($id);
        return view('ujian.kategori.show')->with($data);
    }

    public function destroy(Request $request, $id)
    {
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus Kategori Ujian',
        ];

        $kategori = KategoriUjian::find($id);
        if ($kategori->delete()) {
            $data_log['description'] = 'Berhasil menghapus data kategori ujian dengan id ' . $kategori->id;
            Alert::success('Success', 'Delete Data Success');
        } else {
            $data_log['description'] = 'Gagal menghapus data kategori ujian dengan id ' . $kategori->id;
            Alert::error('Failed', 'Delete Data Failed');
        }

        Log::create($data_log);
        return redirect()->back();
    }
}

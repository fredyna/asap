<?php

namespace App\Http\Controllers\BankSoal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipesoal;
use Alert;
use App\Log;

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

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Tambah Tipe Soal',
        ];

        $tipeSoal = Tipesoal::create($data);
        if ($tipeSoal) {
            $data_log['description'] = 'Berhasil menambah data tipe soal';
            Alert::success('Success', 'Save Data Success');
        } else {
            $data_log['description'] = 'Gagal menambah data tipe soal';
            Alert::error('Failed', 'Save Data Failed');
        }

        Log::create($data_log);
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

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Edit Tipe Soal',
        ];

        $tipe = Tipesoal::find($id);
        if ($tipe->update($data)) {
            $data_log['description'] = 'Berhasil mengedit data tipe soal dengan id ' . $tipe->id;
            Alert::success('Success', 'Save Data Success');
        } else {
            $data_log['description'] = 'Gagal mengedit data tipe soal dengan id ' . $tipe->id;
            Alert::error('Failed', 'Save Data Failed');
        }

        Log::create($data_log);
        return redirect()->route('tipe-soal.index');
    }

    public function destroy(Request $request, $id)
    {
        $tipe = Tipesoal::find($id);

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus Tipe Soal',
        ];

        if ($tipe->delete()) {
            $data_log['description'] = 'Berhasil menghapus data tipe soal dengan id ' . $tipe->id;
            Alert::success('Success', 'Delete Data Success');
        } else {
            $data_log['description'] = 'Gagal menghapus data tipe soal dengan id ' . $tipe->id;
            Alert::error('Failed', 'Delete Data Failed');
        }

        Log::create($data_log);
        return redirect()->back();
    }
}

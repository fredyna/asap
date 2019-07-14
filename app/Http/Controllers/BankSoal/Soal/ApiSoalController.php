<?php

namespace App\Http\Controllers\BankSoal\Soal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Soal;
use App\Transformers\SoalTransformer;
use App\Log;

class ApiSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $search     = empty($request->get('search')) ? '' : $request->get('search');
        $tipe       = empty($request->get('tipe')) ? '' : $request->get('tipe');
        $kategori   = empty($request->get('kategori')) ? '' : $request->get('kategori');

        $soal = null;
        if ($tipe != '' && $kategori != '' && $search != '') {
            $soal = Soal::where('tipe_soal_id', $tipe)
                ->where('kategori_soal_id', $kategori)
                ->where('soal', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($tipe != '' && $kategori != '') {
            $soal = Soal::where('tipe_soal_id', $tipe)
                ->where('kategori_soal_id', $kategori)
                ->paginate(10);
        } else if ($tipe != '' && $search != '') {
            $soal = Soal::where('tipe_soal_id', $tipe)
                ->where('soal', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($kategori != '' && $search != '') {
            $soal = Soal::where('kategori_soal_id', $kategori)
                ->where('soal', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($tipe != '' || $kategori != '') {
            $soal = Soal::where('tipe_soal_id', $tipe)
                ->orWhere('kategori_soal_id', $kategori)
                ->paginate(10);
        } else {
            $soal = Soal::Where('soal', 'like', "%{$search}%")
                ->paginate(10);
        }

        $data = fractal($soal, new SoalTransformer())->toArray();
        $data['meta'] = [
            'per_page'  => $soal->perPage(),
            'current_page' => $soal->currentPage(),
            'last_page' => $soal->lastPage(),
            'next_page_url' => $soal->nextPageUrl(),
            'prev_page_url' => $soal->previousPageUrl(),
            'from'    => $soal->firstItem(),
            'total'   => $soal->total(),
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $soal = Soal::find($id);
        $data = fractal($soal, new SoalTransformer())->toArray();
        $data['meta']   = null;

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe_id'       => 'required',
            'kategori_id'   => 'required',
            'soal'          => 'required',
            'jawaban_1'     => 'required',
            'jawaban_2'     => 'required',
            'jawaban_3'     => 'required',
            'jawaban_4'     => 'required',
            'jawaban_benar'     => 'required',
            'file'          => 'nullable|image|mimes:mpga,wav|max:8192'
        ]);

        $output = [];

        if ($validator->fails()) {
            $output = [
                'status' => false,
                'errorcode' => 1,
                'message' => 'Ada kolom yang belum diisi'
            ];
        }

        $file = null;
        if (!empty($request->file('file'))) {
            $uploadedFile = $request->file('file');
            $file = 'soal' . time() . str_random(18) . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('soal'), $file);
        }

        $data = [
            'tipe_soal_id'       => $request->tipe_id,
            'kategori_soal_id'   => $request->kategori_id,
            'soal'          => $request->soal,
            'jawaban_1'     => $request->jawaban_1,
            'jawaban_2'     => $request->jawaban_2,
            'jawaban_3'     => $request->jawaban_3,
            'jawaban_4'     => $request->jawaban_4,
            'jawaban_benar' => $request->jawaban_benar,
            'file'          => $file,
        ];

        if (!empty($request->id)) {
            $data_log = [
                'user_id' => $request->user()->id,
                'name'  => 'Tambah Soal',
            ];

            $soal = Soal::find($request->id);
            if ($soal->update($data)) {
                $data_log['description'] = 'Berhasil mengedit data soal dengan id ' . $soal->id;
                $output = [
                    'status' => true,
                    'errorcode' => 0,
                    'message' => 'Berhasil update data!'
                ];

                Log::create($data_log);
                return response()->json($output, 200);
            }
        } else {
            $data_log = [
                'user_id' => $request->user()->id,
                'name'  => 'Tambah Soal',
            ];

            if (Soal::create($data)) {
                $data_log['description'] = 'Berhasil menambah data soal';
                $output = [
                    'status' => true,
                    'errorcode' => 0,
                    'message' => 'Berhasil tambah data!'
                ];

                Log::create($data_log);
                return response()->json($output, 200);
            }
        }

        $output = [
            'status' => false,
            'errorcode' => 1,
            'message' => 'Gagal menyimpan data!'
        ];

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Tambah/Edit Soal',
            'description' => 'Gagal menambah/mengedit data soal'
        ];

        Log::create($data_log);
        return response()->json($output, 400);
    }

    public function destroy(Request $request, $id)
    {
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus Soal',
        ];

        $soal = Soal::findOrFail($id);
        $output = null;
        if ($soal->delete()) {
            $data_log['description'] = 'Berhasil menghapus data soal dengan id ' . $soal->id;
            $output = [
                'status' => true,
                'errorcode' => 0,
                'message' => 'success'
            ];
        } else {
            $data['description'] = 'Gagal menghapus data soal dengan id ' . $soal->id;
            $output = [
                'status' => false,
                'errorcode' => 1,
                'message' => 'Delete Error!'
            ];
        }

        Log::create($data_log);
        return response()->json($output, 200);
    }
}

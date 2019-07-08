<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\Soal;
use App\Transformers\SoalTransformer;

class ApiSoalUjianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $ujian = Ujian::find($request->ujian_id);
        $soals = Soal::find($request->soal_id);

        $output = null;
        if ($ujian->soals()->attach($soals)) {
            $output = [
                'status' => true,
                'errorcode' => 0,
                'message' => 'success'
            ];
        } else {
            $output = [
                'status' => false,
                'errorcode' => 1,
                'message' => 'Save Error!'
            ];
        }

        return response()->json($output, 200);
    }

    public function show(Request $request, $id)
    {
        $ujian = Ujian::find($id);

        $search     = empty($request->get('search')) ? '' : $request->get('search');
        $tipe       = empty($request->get('tipe')) ? '' : $request->get('tipe');
        $kategori   = empty($request->get('kategori')) ? '' : $request->get('kategori');

        $soal = null;
        if ($tipe != '' && $kategori != '' && $search != '') {
            $soal = $ujian->soals()->where('tipe_soal_id', $tipe)
                ->where('kategori_soal_id', $kategori)
                ->where('soal', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($tipe != '' && $kategori != '') {
            $soal = $ujian->soals()->where('tipe_soal_id', $tipe)
                ->where('kategori_soal_id', $kategori)
                ->paginate(10);
        } else if ($tipe != '' && $search != '') {
            $soal = $ujian->soals()->where('tipe_soal_id', $tipe)
                ->where('soal', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($kategori != '' && $search != '') {
            $soal = $ujian->soals()->where('kategori_soal_id', $kategori)
                ->where('soal', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($tipe != '' || $kategori != '') {
            $soal = $ujian->soals()->where('tipe_soal_id', $tipe)
                ->orWhere('kategori_soal_id', $kategori)
                ->paginate(10);
        } else {
            $soal = $ujian->soals()->Where('soal', 'like', "%{$search}%")
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        $ujian = Ujian::find($request->get('ujian'));
        $soal = Soal::find($id);

        $output = null;
        if ($ujian->soals()->detach($soal)) {
            $output = [
                'status' => true,
                'errorcode' => 0,
                'message' => 'success'
            ];
        } else {
            $output = [
                'status' => false,
                'errorcode' => 1,
                'message' => 'Delete Error!'
            ];
        }

        return response()->json($output, 200);
    }
}

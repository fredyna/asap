<?php

namespace App\Http\Controllers\Ujian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\Transformers\UjianTransformer;
use App\Log;

class ApiUjianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $search     = empty($request->get('search')) ? '' : $request->get('search');
        $kategori   = empty($request->get('kategori')) ? '' : $request->get('kategori');

        $ujian = null;
        if ($kategori != '' && $search != '') {
            $ujian = Ujian::where('kategori_ujian_id', $kategori)
                ->where('nama', 'like', "%{$search}%")
                ->paginate(10);
        } else if ($kategori != '') {
            $ujian = Ujian::where('kategori_ujian_id', $kategori)
                ->paginate(10);
        } else {
            $ujian = Ujian::Where('nama', 'like', "%{$search}%")
                ->paginate(10);
        }

        $data = fractal($ujian, new UjianTransformer())->toArray();
        $data['meta'] = [
            'per_page'  => $ujian->perPage(),
            'current_page' => $ujian->currentPage(),
            'last_page' => $ujian->lastPage(),
            'next_page_url' => $ujian->nextPageUrl(),
            'prev_page_url' => $ujian->previousPageUrl(),
            'from'    => $ujian->firstItem(),
            'total'   => $ujian->total(),
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $ujian = [
            'data' => Ujian::find($id)
        ];
        return response()->json($ujian);
    }

    public function destroy(Request $request, $id)
    {
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus Ujian',
        ];

        $ujian = Ujian::findOrFail($id);
        $output = null;
        if ($ujian->delete()) {
            $data_log['description'] = 'Berhasil menghapus data ujian dengan id ' . $ujian->id;
            $output = [
                'status' => true,
                'errorcode' => 0,
                'message' => 'success'
            ];
        } else {
            $data_log['description'] = 'Gagal menghapus data ujian dengan id ' . $ujian->id;
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

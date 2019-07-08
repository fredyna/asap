<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $search = !empty($request->get('search')) ? $request->get('search') : '';

        $data['logs'] = Log::where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
            $query->orWhere('description', 'like', "%{$search}%");
        })
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);
        $data['search'] = $search;
        return view('log.index')->with($data);
    }

    public function destroy($id)
    {
        Log::delete($id) ?
            Alert::success('Hapus Suksese!', 'Data log berhasil dihapus.') : Alert::error('Hapus Gagal!', 'Data log gagal dihapus.');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UjianUser;
use App\Ujian;
use Illuminate\Support\Carbon;
use App\UjianTemporary;
use Alert;
use App\Log;

class UjianRunController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request, $id)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : null;
        $jawaban = !empty($request->get('jawaban')) ? $request->get('jawaban') : null;
        $id_ujian = !empty($request->get('id_ujian')) ? $request->get('id_ujian') : null;

        if ($page) {
            $ujianTemporary = UjianTemporary::find($id_ujian);
            $ujianTemporary->jawaban = $jawaban;
            $ujianTemporary->save();
        }

        $data['ujians'] = UjianUser::find($id)->ujianTemporaries()->with('soal')->paginate(1);
        $data['ujian_all'] = UjianUser::find($id)->ujianTemporaries()->with('soal')->get();
        $data['ujian_now']  = UjianUser::find($id)->latest()->first();
        $data['ujian_now']['nama']  = $data['ujian_now']->ujian->nama;
        $dateNow = Carbon::now();
        $interval = (strtotime($dateNow) - strtotime($data['ujian_now']->created_at));
        $data['minute']   = date('i', $interval);
        $data['seconds']   = date('s', $interval);

        // dd($data);
        return view('member.ujian.ujian')->with($data);
    }

    public function save(Request $request, $id)
    {
        $jawaban = !empty($request->get('jawaban')) ? $request->get('jawaban') : null;
        $id_ujian = !empty($request->get('id_ujian')) ? $request->get('id_ujian') : null;

        $jawaban_benar = 0;
        $jawaban_salah = 0;
        $jawaban_kosong = 0;


        $ujianTemporary = UjianTemporary::find($id_ujian);
        $ujianTemporary->jawaban = $jawaban;
        if (!$ujianTemporary->save())
            Alert::error('Gagal', 'Gagal menyimpan jawaban');

        $ujians = UjianUser::find($id)->ujianTemporaries()->with('soal')->get();
        foreach ($ujians as $ujian) {
            if ($ujian->jawaban == '') {
                $jawaban_kosong += 1;
            } else if ($ujian->soal->jawaban_benar == $ujian->jawaban) {
                $jawaban_benar += 1;
            } else {
                $jawaban_salah += 1;
            }
        }

        $ujianUser = UjianUser::find($id);
        $ujianUser->jawaban_benar = $jawaban_benar;
        $ujianUser->jawaban_salah = $jawaban_salah;
        $ujianUser->jawaban_kosong = $jawaban_kosong;
        $ujianUser->status = 1;

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Selesai Ujian',
            'description' => 'Menyelesaikan ujian dengan id ' . $ujianUser->ujian_id
        ];

        if ($ujianUser->save()) {
            $ujianUser->ujianTemporaries()->delete();
            Log::create($data_log);

            Alert::success('Sukses', 'Berhasil Menyimpan Jawaban');
        } else {
            Alert::error('Gagal', 'Gagal Menyimpan Jawaban');
        }

        return redirect()->route('pengumuman.index');
    }
}

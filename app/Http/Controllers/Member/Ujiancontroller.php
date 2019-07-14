<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\Transformers\UjianUserTransformer;
use Illuminate\Support\Facades\DB;
use App\UjianUser;
use App\User;
use App\UjianTemporary;
use Alert;
use Carbon\Carbon;
use App\Log;

class Ujiancontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('member.ujian.ujian');
    }

    public function enroll(Request $request, $ujian_id)
    {
        $ujians = Ujian::with('ujianUsers')
            ->with('soals')
            ->where('id', $ujian_id)
            ->first();
        $ujianUser = UjianUser::where('ujian_id', $ujian_id)->where('user_id', $request->user()->id)->latest()->first();
        $data = fractal($ujians, new UjianUserTransformer(['user_id' => $request->user()->id]))->toArray();

        $past = 0;
        if (!empty($ujianUser)) {
            $dateNow = Carbon::now();
            $interval = (strtotime($dateNow) - strtotime($ujianUser->created_at)) / 60;
            if ($interval > 10) {
                $past = 1;
            }
            $data['data']['status'] = $ujianUser->status;
            $data['data']['past'] = $past;
        } else {
            $data['data']['status'] = 2;
            $data['data']['past'] = $past;
        }

        return view('member.ujian.show')->with($data);
    }

    public function enrollUjian(Request $request, $id)
    {
        $user_id = $request->user()->id;
        $ujianUser = User::find($user_id)->ujians()->latest()->first();
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Mulai Ujian',
            'description' => 'Memulai mengerjakan ujian dengan id ' . $id
        ];

        if (!empty($ujianUser) && $ujianUser->status == 0) {
            $dateNow = Carbon::now();
            $interval = (strtotime($dateNow) - strtotime($ujianUser->created_at)) / 60;
            if ($interval > 10) {
                if (!$ujianUser->ujianTemporaries()->delete()) {
                    $ujianUser->status = 1;
                    $ujianUser->save();

                    Alert::error('Gagal', 'Gagal memulai ujian');
                }

                $dataUjianUser = [
                    'ujian_id' => $id,
                    'user_id'  => $user_id,
                ];
                $ujianUser2 = UjianUser::create($dataUjianUser);

                $soals = Ujian::find($ujianUser2->ujian_id)->soals()->get();

                foreach ($soals as $soal) {
                    $data = [
                        'ujian_user_id' => $ujianUser2->id,
                        'soal_id'       => $soal->id
                    ];
                    UjianTemporary::create($data);
                }

                Log::create($data_log);
                return redirect()->route('member.ujian', $ujianUser2->id);
            }

            Log::create($data_log);
            return redirect()->route('member.ujian', $ujianUser->id);
        } else {
            $dataUjianUser = [
                'ujian_id' => $id,
                'user_id'  => $user_id,
            ];

            $ujianUser2 = UjianUser::create($dataUjianUser);
            if (!$ujianUser2)
                Alert::error('Gagal', 'Gagal memulai ujian');

            $soals = Ujian::find($ujianUser2->ujian_id)->soals()->get();
            foreach ($soals as $soal) {
                $data = [
                    'ujian_user_id' => $ujianUser2->id,
                    'soal_id'       => $soal->id
                ];
                UjianTemporary::create($data);
            }


            Log::create($data_log);
            return redirect()->route('member.ujian', $ujianUser2->id);
        }
    }
}

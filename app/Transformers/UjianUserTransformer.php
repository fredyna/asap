<?php

namespace App\Transformers;

use App\Ujian;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Request;

class UjianUserTransformer extends TransformerAbstract
{
    protected $user_id;
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Ujian $data)
    {
        $user_id = $this->user_id;
        return [
            'id'                =>  $data->id,
            'kategori_ujian_id' =>  $data->kategori_ujian_id,
            'kategori_ujian'    =>  $data->kategori->nama,
            'nama'              =>  $data->nama,
            'jumlah_coba'       =>  $data->ujianUsers()->where('user_id', $user_id)->count(),
            'jumlah_soal'       =>  $data->soals()->count(),
            'slug'              =>  $data->slug,
        ];

        //status 2 adalah status belum pernah mencoba
    }
}

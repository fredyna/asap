<?php

namespace App\Transformers;

use App\Soal;
use League\Fractal\TransformerAbstract;

class SoalTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Soal $data)
    {
        return [
            'id'                =>  $data->id,
            'tipe_soal_id'      =>  $data->tipe_soal_id,
            'tipe_soal'         =>  $data->tipe->tipe,
            'kategori_soal_id'  =>  $data->kategori_soal_id,
            'kategori_soal'     =>  $data->kategori->kategori,
            'soal'              =>  $data->soal,
            'jawaban_1'         =>  $data->jawaban_1,
            'jawaban_2'         =>  $data->jawaban_2,
            'jawaban_3'         =>  $data->jawaban_3,
            'jawaban_4'         =>  $data->jawaban_4,
            'jawaban_benar'     =>  $data->jawaban_benar,
            'file'              =>  $data->file,
        ];
    }
}

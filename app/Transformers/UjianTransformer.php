<?php

namespace App\Transformers;

use App\Ujian;
use League\Fractal\TransformerAbstract;

class UjianTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Ujian $data)
    {
        return [
            'id'                =>  $data->id,
            'kategori_ujian_id' =>  $data->kategori_ujian_id,
            'kategori_ujian'    =>  $data->kategori->nama,
            'nama'              =>  $data->nama,
            'slug'              =>  $data->slug,
        ];
    }
}

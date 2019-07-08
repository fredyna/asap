<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Soal extends Model
{
    use SoftDeletes;
    protected $table = 'soal';

    protected $fillable = [
        'tipe_soal_id', 'kategori_soal_id', 'soal',
        'jawaban_1', 'jawaban_2', 'jawaban_3', 'jawaban_4',
        'jawaban_benar', 'file'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSoal::class, 'kategori_soal_id', 'id');
    }

    public function tipe()
    {
        return $this->belongsTo(Tipesoal::class, 'tipe_soal_id', 'id');
    }

    public function ujians()
    {
        return $this->belongsToMany(Ujian::class, 'soal_ujian', 'soal_id', 'ujian_id')->withTimestamps();
    }
}

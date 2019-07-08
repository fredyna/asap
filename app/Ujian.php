<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ujian extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kategori_ujian_id', 'nama', 'slug'
    ];

    protected $table = 'ujian';

    public function kategori()
    {
        return $this->belongsTo(KategoriUjian::class, 'kategori_ujian_id', 'id');
    }

    public function soals()
    {
        return $this->belongsToMany(Soal::class, 'soal_ujian', 'ujian_id', 'soal_id')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriUjian extends Model
{
    use SoftDeletes;

    protected $table = 'kategori_ujian';

    protected $fillable = [
        'nama', 'deskripsi'
    ];

    public function ujians()
    {
        return $this->hasMany(Ujian::class);
    }
}

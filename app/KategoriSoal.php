<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriSoal extends Model
{
    use SoftDeletes;

    protected $table = 'kategori_soal';

    protected $fillable = [
        'kategori', 'deskripsi'
    ];

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipesoal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tipe', 'deskripsi'
    ];

    protected $table = 'tipe_soal';

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UjianTemporary extends Model
{
    protected $table = 'ujian_temporaries';
    protected $guarded = [];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}

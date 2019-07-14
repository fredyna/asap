<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UjianUser extends Model
{
    use SoftDeletes;

    protected $table = 'ujian_users';
    protected $guarded = [];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ujianTemporaries()
    {
        return $this->hasMany(UjianTemporary::class);
    }
}

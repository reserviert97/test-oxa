<?php

namespace App;

use App\UserDetail;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'level', 'minimum_generated'
    ];

    public function users()
    {
        return $this->hasMany(UserDetail::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'name', 'description', 'minimum_level'
    ];

    public function users()
    {
        return $this->hasMany(UserDetail::class);
    }
}

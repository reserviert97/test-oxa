<?php

namespace App;

use App\User;
use App\Badge;
use App\Level;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'users_detail';
    protected $fillable = [
        'user_id', 'level_id', 'badge_id', 'total_generated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }

}

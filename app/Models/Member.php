<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}

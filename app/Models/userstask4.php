<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userstask4 extends Model
{
    use HasFactory;

    protected $table = 'userstask4s';

    protected $fillable =[
        'name',
        'email',
        'is_active'
    ];
    protected $primaryKey = 'id';

    public $timestamps = true;
}

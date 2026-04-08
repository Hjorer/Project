<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    public function country()
    {
        return $this->belongsTo(Country::class, 'CountryCode', 'Code');
    }
    protected $fillable = [
        'Name',
        'CountryCode',
        'District',
        'Population',
    ];
    public $timestamps = false;

}

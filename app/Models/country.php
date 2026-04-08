<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $primaryKey = 'Code';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    public function cities() {
        return $this->hasMany(City::class, 'CountryCode', 'Code');
    }
    public function languages() {
        return $this->hasMany(Country_Languages::class, 'CountryCode', 'Code');
    }
    public function scopeIndependent($query) {
        return $query->whereNotNull('IndepYear');
    }
}

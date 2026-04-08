<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class country_languages extends Model
{
    protected $table = 'country_languages';
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;
    public function country()
    {
        return $this->belongsTo(country::class, 'CountryCode', 'Code');
    }
}

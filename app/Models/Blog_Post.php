<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Post extends Model
{
    protected $table = 'blog__post';
    use HasFactory,Sluggable;
    public function blog_tags(){
        return $this->belongsToMany(Blog_Tag::class);
    }
    public function blog_category(){
        return $this->belongsTo(Blog_Category::class);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable():array{
        return[
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }
}

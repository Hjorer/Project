<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Tag extends Model
{
    protected $table = 'blog__tags';
    use HasFactory,Sluggable;
    public function blog_posts(){
        return $this->belongsToMany(Blog_Post::class);
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

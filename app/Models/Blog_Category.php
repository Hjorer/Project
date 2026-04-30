<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Blog_Category extends Model
{
    protected $table = 'blog__categories';
    use HasFactory,Sluggable;
    public function blog_posts(){
        return $this->hasMany(Blog_Post::class);
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

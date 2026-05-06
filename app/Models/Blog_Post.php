<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Post extends Model
{
    protected $table = 'blog__posts';
    use HasFactory, Sluggable;
    public function posts()
    {
        return $this->hasMany(Blog_Post::class);
    }
    public function category()
    {
        return $this->belongsTo(Blog_Category::class, 'blog_category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Blog_Tag::class, 'blog_post_blog_tage');
    }

    protected $guarded = [];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

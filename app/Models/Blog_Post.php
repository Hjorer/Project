<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class Blog_Post extends Model
{
    protected $table = 'blog__posts';
    use HasFactory, Sluggable;
    protected $fillable = ['title', 'description', 'content', 'blog__category_id', 'thumbnail'];
    public function posts()
    {
        return $this->hasMany(Blog_Post::class);
    }
    public function category()
    {
        return $this->belongsTo(Blog_Category::class, 'blog__category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Blog_Tag::class, 'blog_post_blog_tage')->withTimestamps();
        ;
    }
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
    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset("no-image.png");
        }
        return asset("uploads/{$this->thumbnail}");
    }
    public function getPostDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }

}

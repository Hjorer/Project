<?php

namespace App\Http\Controllers\ADMIN;

use App\Models\Blog_Tag;
use App\Models\Blog_Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $posts = Blog_Post::all();
        return view ('admin.index',compact('posts'));
        
    }
    public function rerere(){
        $tag = new Blog_Tag();
        $tag->title ='Hello World!';
        $tag->save();
        $tags = \App\Models\Blog_Tag::all();
/*         dd($tag); */
        return view ('admin.index',compact('tags'));
    }
}

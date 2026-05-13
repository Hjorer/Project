<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog_Category;
use App\Models\Blog_Tag;
use App\Models\Blog_Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Blog_Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Blog_Category::pluck('title', 'id')->all();
        $tags = Blog_Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /*  // 1. Валидация
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'blog_category_id' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Обработка изображения
        if ($request->hasFile('thumbnail')) {
            $folder = date('Y-m-d');
            $validated['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");
        }

        // ВАЖНО: Если у вас есть генерация slug, добавляем его вручную, 
        // исключая при этом массив тегов из базовой вставки в таблицу posts
        $validated['slug'] = Str::slug($validated['title']);

        // 3. Создание записи (передаем только валидные поля для таблицы posts)
        $post = Blog_Post::create($validated);

        // 4. Привязка тегов через промежуточную таблицу (многие ко многим)
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }

        return redirect()->route('posts.index')->with('success', 'Статья добавлена'); */
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'blog__category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        // 2. Обработка картинки (работаем уже с $validatedData)
        $data = $request->all();
        $data['thumbnail'] = Blog_Post::uploadImage($request);

        // 3. Создание поста (передаем только проверенные поля)
        $post = Blog_Post::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Blog_Post::findOrFail($id);
        $categories = Blog_Category::pluck('title', 'id')->all();
        $tags = Blog_Tag::pluck('title', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
      public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'blog__category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        $post = Blog_Post::find($id);
        $data = $request->all();
        $data['thumbnail'] = Blog_Post::uploadImage($request, $post->thumbnail);

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Blog_Post::find($id);
        $post->tags()->sync([]);
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}

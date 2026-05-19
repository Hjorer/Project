<?php

namespace App\Providers;
use App\Models\Blog_Post;
use App\Models\Blog_Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('popular_posts', Blog_Post::orderBy('views', 'desc')->limit(3)->get());
            
            $view->with('cats', Blog_Category::withCount('blog_posts')->orderBy('blog_posts_count', 'desc')->get());
        });
    }
}

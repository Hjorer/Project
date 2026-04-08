<?php

namespace App\Http\Controllers;

use App\Models\articlesstask4;
use App\Models\productstask4;
use App\Models\userstask4;
use Illuminate\Http\Request;

class Task4Controller extends Controller
{
    public function task4()
    {
        $articleone = articlesstask4::find(1);
        $articletwo = articlesstask4::where('is_published', true);
        $articlethree = Articlesstask4::whereNull('published_at')->get();
        $articlefour = Articlesstask4::where('is_published', true)
            ->where(function ($query) {
                $query->where('views', '>', 2000)
                    ->orWhere('published_at', '>=', now()->subDays(30));
            })->get();
        $articlefive = Articlesstask4::count();
        $articlesix = Articlesstask4::where('is_published', true)->count();
        $articleseven = Articlesstask4::where('is_published', true)->sum('views');
        $productone = productstask4::where('price', '>');
        $producttwo = productstask4::where('is_published', true);
        $productthree = Productstask4::whereBetween('price', [100, 1000])->get();
        $productfour = Productstask4::where(function ($query) {
            $query->where('rating', '<', 3)
                ->orWhere('price', '>', 10000);
        })->get();
        $productfive = Productstask4::min('price');
        $productsix = Productstask4::max('price');
        $productseven = Productstask4::where('is_published', true)->avg('rating');
        $producteight = Productstask4::where('price', '>', 50000)->exists();
        $userone = userstask4::where('is_active', true)
            ->orderBy('name', 'asc')
            ->get();
        $usertwo = userstask4::where('is_active', false)->first();
        $userthree = Userstask4::where('email', 'like', '%@example.com')->get();
        $userfour = Userstask4::where('is_active', true)
            ->where(function ($query) {
                $query->where('name', 'like', 'A%')
                    ->orWhere('name', 'like', 'B%');
            })->get();
        $userfive = Userstask4::where('is_active', false)->exists();
        $usersix = Userstask4::orderBy('id', 'desc')->value('email');
        return view('task4.show',['a1' => $articleone,'a2' => $articletwo,'a3' => $articlethree,'a4' => $articlefour,'a5' => $articlefive,'a6' => $articlesix,'a7' => $articleseven,'p1' =>$productone,'p2' =>$producttwo,'p3' =>$productthree,'p4' =>$productfour,'p5' =>$productfive,'p6' =>$productsix,'p7' =>$productseven,'p8' =>$producteight,'u1' => $userone,'u2' => $usertwo,'u3' => $userthree,'u4' => $userfour,'u5' => $userfive,'u6' => $usersix]);
    }
}

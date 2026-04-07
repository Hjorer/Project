<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Task3Controller extends Controller
{
    public function task3()
    {
        $d1 = DB::table('users')->insert([
            'email' => 'kayla@example.com',
            'login' => 0,
            'password' => 0
        ]);
        $d2 = DB::table('users')->insert([
            ['email' => 'picard@example.com', 'password' => 0, 'login' => 0],
            ['email' => 'janeway@example.com', 'password' => 0, 'login' => 0],
            ['email' => 'janeway@example.com', 'password' => 0, 'login' => 0],
        ]);
        $d3 = DB::table('users')
            ->where('id', 3)
            ->update(['login' => 1, 'email' => 'e@m.k']);
        $d4 = DB::table('users')
            ->where('id', 1)
            ->delete();
        $d5 = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name as product_name', 'categories.name as category_name')
            ->get();
        $d6 = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.name as product_name',
                'categories.name as category_name'
            )
            ->get();
        $d7 = DB::table('products')
            ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'categories.name as category_name',
                'products.name as product_name'
            )
            ->get();
        $d8 = DB::table('categories')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->whereNull('products.id')
            ->select('categories.name as empty_category_name')
            ->get();
        $d9 = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->whereNull('categories.id')
            ->select('products.name as product_name', 'products.category_id')
            ->get();
        dump($d1,$d2,$d3,$d4,$d5,$d6,$d7);
    }
}

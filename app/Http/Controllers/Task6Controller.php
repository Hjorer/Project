<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\category;
use App\Models\product;
use App\Models\Country;
use Illuminate\Http\Request;

class Task6Controller extends Controller
{
    public function task6()
    {
        $members = Member::with(['profile', 'city.country'])->get();
        $singleUser = Member::with(['profile', 'city.country'])->first();
        $countries = Country::with('cities')->get();
        return view('task6.index', compact('members', 'singleUser', 'countries'));
    }
    public function view()
    {
        $products = Product::with('categories')->get();
        $categories = Category::with('products')->get();
        foreach ($products as $product) {
            echo $product->name . " относится к категориям: ";
            foreach ($product->categories as $category) {
                echo $category->name . ' ';
            }
        }
        foreach ($categories as $category) {
            echo "В категории " . $category->name . " находятся продукты: ";
            foreach ($category->products as $product) {
                echo $product->name . ' ';
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255','unique:users'],
            'password'=>['required','confirmed']
        ]);

        User::create($request->all());


        return redirect()->route('login')->with('success','Successfully registration');
    }
    public function login(){
        return view('user.login');
    }
}

<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Task3Controller;
use App\Http\Controllers\Task4Controller;
use App\Http\Controllers\Task5Controller;
use App\Http\Controllers\Task6Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/task2', [EmployeeController::class, 'index']);
//Task 1 part 1

/* Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    echo '!';
});
Route::get('dir/test', function () {
    echo '!!';
});
Route::get('/user/{id}', function (int $id) {
    echo $id;
});
Route::get('/user/{name}', function (string $name) {
    echo 'имя юзера ' . $name;
});
Route::get('/sum/{num1}/{num2}', function (string $num1,$num2) {
    echo $num1 + $num2;
});
Route::get('/user/show-{id}', function (string $id) {
    echo $id;
})->where('id', '[0-9]+');

Route::get('/user/{id?}', function (?int $id = 0) {
    return $id;
}); */

//Task 1 part 2

/* Route::get('/user/{id}', function (int $id) {
    echo $id;
})->where('id', '[0-9]+'); */

/* Route::get('/user/{id}/{name}', function ($id, $name) {
    return "User ID: $id, Name: $name";
})->where(['id' => '[0-9]+', 'name' => '[a-z]{3,}']);

Route::get('/articles/{date}', function ($date) {
    return "Статьи за дату: $date";
})->where('date', '[0-9]{4}-[0-9]{2}-[0-9]{2}');

Route::get('/users/{order}', function ($order) {
    return "Сортировка пользователей по полю: $order";
})->where('order', 'name|surname|age');

Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
        $date = Carbon::createFromDate($year, $month, $day);
        return "Дата $year-$month-$day — это " . $date->translatedFormat('l');
})->where(['year' => '[0-9]{4}', 'month' => '[0-9]{1,2}', 'day' => '[0-9]{1,2}']); */

//Task3

/* Route::get('/task3',[Task3Controller::class,'task3']);
Route::get('/task4',[Task4Controller::class,'task4']);
Route::get('/task5', [Task5Controller::class, 'task5']);
Route::get('/task6', [Task6Controller::class, 'task6']);
Route::get('/task61', [Task6Controller::class, 'view']); */

//Part 2 Task 1
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('dashborad', [UserController::class, 'dashboard'])->name('dashboard');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');

    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');

    Route::get('forgot-password',function(){
        return view('user.forgot-password');
    })->name('password.request');

    Route::post('forgot-password',[UserController::class,'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');

    Route::get('reset-password/{token}',function(string $token){
        return view('user.reset-password',['token'=>$token]);
    })->name('password.reset');

    Route::post('reset-password',[UserController::class,'resetPasswordUpdate'])->name('password.update');
});


Route::get('verify-email', function () {
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
})->middleware('signed')->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['throttle:3,1'])->name('verification.send');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
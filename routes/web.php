<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/welcome', 'welcome');
Route::redirect('/here', '/there');

Route::get('/user/{name?}', function ($name = 'Masud Alam') {
    return $name;
});
Route::get('/user2/{name2}', function ($name2) {
    return "Name: ".$name2;
})->where('name2', '[A-Za-z]+');  //accept only alphabetical value

Route::get('/profile/test', function () {
    return view('test');
})->name('profile');

use App\Http\Controllers\UserController;
Route::prefix('user')
    ->name('user.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/create','create')->name('create');
        Route::get('/read','read')->name('read');
        Route::get('/update/{id}','update')->name('update');
        Route::get('/delete/{id}','delete')->name('delete');
    });

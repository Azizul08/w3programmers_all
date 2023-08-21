<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

// Route::get('/user/{name?}', function ($name = 'Masud Alam') {
//     return $name;
// });
Route::get('/user2/{name2}', function ($name2) {
    return "Name: ".$name2;
})->where('name2', '[A-Za-z]+');  //accept only alphabetical value

Route::get('/profile/test', function () {
    return view('test');
})->name('profile');

Route::prefix('user')
    ->name('user.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/create','create')->name('create');
        Route::get('/read','read')->name('read');
        Route::get('/update/{id}','update')->name('update');
        Route::get('/delete/{id}','delete')->name('delete');
    });

use App\Models\User;
    Route::get('/users/{user:email}', function (User $user) {
        return $user->name."<br>".$user->email;
    });

    Route::get('/users/{user}', [UserController::class, 'show']);

use App\Enums\Category;
Route::get('/categories/{category}', function (Category $category) {
    return $category->value;
});

use App\Http\Middleware\check;

Route::middleware([check::class])->group(function(){

    Route::get('/showage/{age?}', [UserController::class, 'showAge']);

});

use Illuminate\Http\Request;
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
    dd($token);
});

use App\Http\Controllers\PostController; 

Route::resource('posts',PostController::class);

use App\Http\Controllers\ProductController;
 
Route::get('/', [ProductController::class, 'index']);  
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::get('/products', [ProductController::class,'index2'])->name('products.index2'); 
Route::get('products/create-step-one', [ProductController::class,'createStepOne'])->name('products.create.step.one');
Route::post('products/create-step-one', [ProductController::class,'postCreateStepOne'])->name('products.create.step.one.post'); 
Route::get('products/create-step-two', [ProductController::class,'createStepTwo'])->name('products.create.step.two'); 
Route::post('products/create-step-two', [ProductController::class,'postCreateStepTwo'])->name('products.create.step.two.post');
Route::get('products/create-step-three', [ProductController::class,'createStepThree'])->name('products.create.step.three');
Route::post('products/create-step-three', [ProductController::class,'postCreateStepThree'])->name('products.create.step.three.post');

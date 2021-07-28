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
})->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function (){
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create');
Route::post('/register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');

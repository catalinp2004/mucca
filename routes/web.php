<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
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
})->name('main');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

    Route::get('/', function () {
        return view('admin.index');
    })->middleware('auth')->name('admin.index');

    Route::resource('products', ProductController::class);
    Route::resource('images', ImageController::class)->only(['store', 'show','destroy']);
    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('subcategories', SubcategoryController::class)->only(['store', 'show', 'update', 'destroy']);
});

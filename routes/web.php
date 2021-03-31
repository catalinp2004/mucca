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

Route::view('/', 'index')->name('home');
Route::view('/info', 'info_page')->name('info');
Route::view('/clienti', 'clienti')->name('clienti');
Route::view('/povestea', 'povestea')->name('povestea');

Route::view('/catalog/{any}', 'catalog')->where('any', '.*');
Route::view('/catalog', 'catalog')->name('catalog');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

    Route::get('/', function () {
        return view('admin.index');
    })->middleware('auth')->name('admin.index');

    Route::resource('products', ProductController::class)->except('show');
    Route::resource('images', ImageController::class)->only(['store', 'show','destroy']);
    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('subcategories', SubcategoryController::class)->only(['store', 'show', 'update', 'destroy']);
    Route::get('/categories/{subcategory}/products', [CategoryController::class, 'showProducts'])->name('categories.products');
    Route::get('/products/randomize', [ProductController::class, 'randomize'])->name('products.randomize');
});


Route::get('optimize', function() {
    \Artisan::call('optimize:clear');
    return('All clear!');
});

Route::get('route-trans-clear', function() {
    \Artisan::call('route:trans:clear');
    return('Trans Routes cleared!');
});

Route::get('key-generate', function() {
    \Artisan::call('key:generate');
    return('Key generated!');
});

Route::get('storage-link', function() {
    \Artisan::call('storage:link');
    return('Storage link generated!');
});

Route::get('migrate', function() {
    \Artisan::call('migrate', array('--path' => 'database/migrations', '--force' => true));
    return('Migration should be complete!');
});

Route::get('migrate-fresh', function() {
    \Artisan::call('migrate:fresh', array('--path' => 'database/migrations', '--force' => true));
    return('Fresh Migration should be complete!');
});

Route::get('migrate-refresh', function() {
    \Artisan::call('migrate:refresh', array('--path' => 'database/migrations', '--force' => true));
    return('Refresh Migration should be complete!');
});

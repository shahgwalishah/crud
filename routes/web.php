<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductController;

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
    return redirect()->route('login');
});

Auth::routes();

/**
 * grouping products routes
**/
Route::prefix('product')->middleware('web')->group(function () {
    Route::get('/add-product', [ProductController::class, 'index'])->name('home');
    Route::post('/store-product',[ProductController::class , 'storeProduct'])->name('storeProduct');
    Route::get('/get-all-products',[ProductController::class , 'getProducts'])->name('getProducts');
    Route::get('/edit-product/{id}',[ProductController::class , 'editProduct'])->name('editProduct');
    Route::post('/update-product',[ProductController::class , 'updateProduct'])->name('updateProduct');
    Route::get('/delete-product/{id}',[ProductController::class , 'deleteProduct'])->name('deleteProduct');
});

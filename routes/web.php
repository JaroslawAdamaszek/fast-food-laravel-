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
    return view('index');
})->name('home.product');

Route::prefix('product')->group(function (){
    Route::get('/index', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/show', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
    Route::get('/create/{product}', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/order', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::post('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
});


Auth::routes();


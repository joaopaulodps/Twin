<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    return redirect('/produtos');
});

Route::get('/categorias', [CategoryController::class, 'index']);
Route::get('/categorias/cadastrar', [CategoryController::class, 'create']);
Route::post('/categorias/store', [CategoryController::class, 'store']);
Route::get('/categorias/{id}', [CategoryController::class, 'edit']);
Route::post('/categorias/update/{id}', [CategoryController::class, 'update']);
Route::post('/categorias/destroy/{id}', [CategoryController::class, 'destroy']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/cadastrar', [ProductController::class, 'create']);
Route::post('/produtos/store', [ProductController::class, 'store']);
Route::get('/produtos/{id}', [ProductController::class, 'edit']);
Route::post('/produtos/update/{id}', [ProductController::class, 'update']);
Route::post('/produtos/destroy/{id}', [ProductController::class, 'destroy']);
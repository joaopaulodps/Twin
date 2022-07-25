<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('categorias/index', [CategoryController::class, 'index']);
Route::post('categorias/store', [CategoryController::class, 'store']);
Route::get('categorias/{id_categoria}/edit', [CategoryController::class, 'edit']);
Route::post('categorias/{id_categoria}/update', [CategoryController::class, 'update']);
Route::post('categorias/{id_categoria}/destroy', [CategoryController::class, 'destroy']);

Route::get('produtos/index', [ProductController::class, 'index']);
Route::post('produtos/store', [ProductController::class, 'store']);
Route::get('produtos/{id_produto}/edit', [ProductController::class, 'edit']);
Route::post('produtos/{id_produto}/update', [ProductController::class, 'update']);
Route::post('produtos/{id_produto}/destroy', [ProductController::class, 'destroy']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCategoria;
use App\Http\Controllers\ControladorProduto;

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
})->name('index');

Route::resource('categorias', ControladorCategoria::class);
Route::resource('produtos', ControladorProduto::class);
Route::get('/produtos', [ControladorProduto::class, 'indexView'])->name('produtos.indexView');
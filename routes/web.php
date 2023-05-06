<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);

//url para la vista que tendria el usuario de los productos
Route::get('/productocliente', [ProductoController::class, 'getProductocliente'])->name('getProductoCliente');

// Route::get('/categorias/{id}', [Producto::class, 'mostrarProductosCategorias'])->name('mostrarProductosCategorias');
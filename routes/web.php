<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::get('/acercade', function () {
    return view('acercade');
});
Route::get('/contacto', function () {
    return view('contacto');
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

Route::resource('productos', ProductoController::class)->names('productos');
Route::resource('categorias', CategoriaController::class)->except('show');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
Route::resource('roles', RoleController::class)->names('roles');

//url para la vista que tendria el usuario de los productos
Route::get('/productocliente', [ProductoController::class, 'getProductocliente'])->name('getProductoCliente');

// Route::get('/categorias/{id}', [Producto::class, 'mostrarProductosCategorias'])->name('mostrarProductosCategorias');

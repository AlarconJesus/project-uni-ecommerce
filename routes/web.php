<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DolarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('users');
Route::get('users/eliminar/{user}', [UserController::class, 'eliminarUsuario'])->name('users.eliminarUsuario');
Route::put('users/eliminar/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('payment', PaymentController::class)->only(['store', 'update'])->names('payment'); // en observacion
Route::get('payment/{id}', [PaymentController::class, 'detalle']);
Route::get('miscompras', [PaymentController::class, 'miscompras'])->name('miscompras');
Route::get('ventas', [PaymentController::class, 'ventas'])->name('ventas');
Route::get('contactanos/{id}', [PaymentController::class, 'contactanos'])->name('contactanos');
Route::get('ventas/detalle/{id}', [PaymentController::class, 'detalleventa']);
Route::resource('dolar', DolarController::class)->except('show')->names('dolar');

Route::get('preguntas_secretas', [UserController::class, 'recuperaPS']);
Route::post('preguntas_secretas', [UserController::class, 'recuperaPS2'])->name('psreset2');

Route::post('preguntas_secretas3', [UserController::class, 'recuperaPS3'])->name('psreset3');
Route::post('preguntas_secretas4', [UserController::class, 'recuperaPS4'])->name('psreset4');
Route::post('forgot-password-2', [UserController::class, 'resetPassword2'])->name('resetpassword2');

Route::get('users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
Route::patch('users/{$user}/updateBan', [UserController::class, 'updateBan'])->name('users.updateBan');

//url para la vista que tendria el usuario de los productos
Route::get('/productocliente', [ProductoController::class, 'getProductocliente'])->name('getProductoCliente');

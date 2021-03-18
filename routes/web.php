<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\admin\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagoController;


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


               /*  |-----------------------|
                   |-Rutas para el Carrito-|
                   |-----------------------| */

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/carrito/agregar', [HomeController::class, 'agregar'])->name('carrito_agregar');
Route::get('/carrito/mostrar', [HomeController::class, 'mostrar'])->name('carrito_mostrar');
Route::get('/carrito/modificar', [HomeController::class, 'modificar'])->name('carrito_modificar');
Route::get('/pago/index', [PagoController::class, 'index'])->name('pago_index');

Route::post('/carrito/eliminar', [HomeController::class, 'eliminar'])->name('carrito_eliminar');
Route::get('/perfil/editar', [HomeController::class, 'editar'])->name('perfil_editar');
Route::post('/perfil/registrar', [HomeController::class, 'editar'])->name('perfil_registrar');




Route::get('/admin/login', function ()
{
    return view('/admin/login');
});
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin_login');

Route::group(['middleware'=>['is_admin']], function()
{
    Route::get('/admin/home', [PedidoController::class, 'index'])->name('pedido_index');

                      /*    |-----------------------|
                            |--Rutas para Producto--|
                            |-----------------------| */

    Route::get('/admin/producto', [ProductoController::class, 'index'])->name('producto_index');
    Route::post('/admin/producto/registrar', [ProductoController::class, 'registrar'])->name('producto_registrar');
    Route::post('/admin/producto/filtrar', [ProductoController::class, 'filtrar'])->name('producto_filtrar');
    Route::post('/admin/producto/eliminar', [ProductoController::class, 'eliminar'])->name('producto_eliminar');
    Route::get('/admin/productos/editar/{id}', [ProductoController::class, 'editar'])->name('producto_editar');
    Route::get('/admin/producto/agregar', function (){
        return view('admin.formularioProducto');
    })->name('producto_agregar');

});



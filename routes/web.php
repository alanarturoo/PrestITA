<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\RegisterController;
use App\Models\prestamo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
    return redirect()->route('home');
});

// ruta para acceder a la pagina de registrar
Route::get('/register', [RegisterController::class, 'show'])->name('register');
// ruta para cuando se registra un nuevo usuario (post), cuando se postea un formulario
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ruta para acceder a la pagina login
Route::get('/login', [LoginController::class, 'show'])->name('login');
// ruta para cuando se postea el formulario de login
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ruta para ir a home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ruta para hacer logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// ruta para ir a la pagina de solicitar un prestamo
Route::get('/Solicitar-Prestamo', [PrestamoController::class, 'index'])->name('solicitar-prestamo');
// ruta para cuando se postea el formulario de solicitar un prestamo
Route::post('/Solicitar-Prestamo', [PrestamoController::class, 'store'])->name('solicitar-prestamo');
// es la ruta para que se desplieguen los presamos del usuario en la pestaña ver prestamos
Route::get('/Ver-Prestamos', [PrestamoController::class, 'show'])->name('ver-prestamos');
// ruta para ir a la venta de realizar pago
Route::get('/realizar-pago/{id_pres}', [PagoController::class, 'index'])->name('realizar-pago');
// ruta para eliminar el pago
Route::get('/eliminar-pago/{id_pago}', [PagoController::class, 'delete'])->name('eliminar-pago');
// ruta pra guardar el pago
Route::post('/pagar/{id_pres}', [PagoController::class, 'store'])->name('Pagar');
// ruta para ver los pagos realizados
Route::get('/Pagos', [PagoController::class, 'show'])->name('pagos');
// ruta para el reporte(pdf) de los prestamos
Route::get('/Prestamos-Reporte', [PrestamoController::class, 'report'])->name('Prestamos-Reporte');
// ruta para el reporte(pdf) de los pagos
Route::get('/Pagos-Reporte', [PagoController::class, 'report'])->name('Pagos-Reporte');

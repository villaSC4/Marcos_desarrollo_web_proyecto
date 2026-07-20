<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Páginas Públicas Principales
Route::get('/', [PublicPageController::class, 'index'])->name('index');
Route::get('/canjes', [PublicPageController::class, 'canjes'])->name('canjes');
Route::get('/prensa', [PublicPageController::class, 'prensa'])->name('prensa');
Route::get('/noticia/{slug}', [PublicPageController::class, 'detalleNoticia'])->name('noticia.detalle');
Route::get('/recicla-en-casa', [PublicPageController::class, 'reciclaCasa'])->name('recicla.casa');
Route::get('/socios', [PublicPageController::class, 'socios'])->name('socios');
Route::get('/unete', [PublicPageController::class, 'unete'])->name('unete');
Route::post('/canjes/{id}', [PublicPageController::class, 'procesarCanje'])->name('canjes.procesar');
Route::post('/actividades/{id}/participar', [PublicPageController::class, 'participarActividad'])->name('actividades.participar');

// Rutas de Autenticación (Colaboradores)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registro', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/registro', [RegisterController::class, 'register'])->name('register.store');

Route::get('/init-app', function () {
    Artisan::call('storage:link');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:clear');

    return "¡Inicialización completada con éxito en Render!";
});
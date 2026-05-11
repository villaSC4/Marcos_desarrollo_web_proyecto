<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/canjes', function () {
    return view('pages.canjes');
})->name('canjes');

Route::get('/prensa', function () {
    $noticias = News::where('publicado', true)
                    ->orderBy('fecha_publicacion', 'desc')
                    ->get();

    return view('pages.prensa', compact('noticias'));
})->name('prensa');

Route::get('/noticia/{slug}', function($slug) {
    $noticia = News::where('slug', $slug)->firstOrFail();
    return view('pages.detalle-noticia', compact('noticia'));
})->name('noticia.detalle');

Route::get('/recicla-en-casa', function () {
    return view('pages.recicla-casa');
})->name('recicla.casa');

Route::get('/socios', function () {
    return view('pages.socios');
})->name('socios');

Route::get('/unete', function () {
    return view('pages.unete');
})->name('unete');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/registro', function () {
    return view('pages.registro');
})->name('register');
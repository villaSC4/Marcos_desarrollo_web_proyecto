<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email'    => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (auth()->guard('colaborador')->attempt($credentials)) {
        
        $request->session()->regenerate();

        return redirect()->intended('/')->with('success', '¡Bienvenido de vuelta!');
    }

    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ])->onlyInput('email'); 
    
})->name('login.store');


Route::post('/logout', function (\Illuminate\Http\Request $request) {
    auth()->guard('colaborador')->logout();
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Has cerrado sesión exitosamente.');
})->name('logout');

Route::get('/registro', function () {
    return view('pages.registro');
})->name('register');

Route::post('/registro', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'nombres'          => 'required|string|max:100',
        'apellidos'        => 'required|string|max:100',
        'fecha_nacimiento' => 'required|date',
        'genero'           => 'nullable|string|max:30', 
        'email'            => 'required|string|email|max:255|unique:colaboradores,email',
        'password'         => 'required|string|min:8|confirmed',
    ]);

    $colaborador = \App\Models\Colaborador::create([
        'nombres'          => $validated['nombres'],
        'apellidos'        => $validated['apellidos'],
        'fecha_nacimiento' => $validated['fecha_nacimiento'],
        'genero'           => $validated['genero'],
        'email'            => $validated['email'],
        'password'         => \Illuminate\Support\Facades\Hash::make($validated['password']),
    ]);

    auth()->guard('colaborador')->login($colaborador);

    return redirect()->route('register')->with('success', '¡Cuenta de colaborador creada exitosamente!');
})->name('register.store'); 
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        $colaborador = Colaborador::where('email', $credentials['email'])->first();

        if ($colaborador) {
            if ($colaborador->estado === false || $colaborador->estado === 0) {
                return back()->withErrors([
                    'email' => 'Su cuenta ha sido suspendida. Por favor, escriba al correo de soporte si requiere información detallada sobre su situación.',
                ])->onlyInput('email');
            }
        }

        if (auth()->guard('colaborador')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', '¡Bienvenido de vuelta!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->guard('colaborador')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Has cerrado sesión exitosamente.');
    }
}
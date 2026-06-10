<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('pages.registro');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nombres'          => 'required|string|max:100',
            'apellidos'        => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero'           => 'nullable|string|max:30', 
            'email'            => 'required|string|email|max:255|unique:colaboradores,email',
            'password'         => 'required|string|min:8|confirmed',
        ]);

        $colaborador = Colaborador::create([
            'nombres'          => $validated['nombres'],
            'apellidos'        => $validated['apellidos'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'genero'           => $validated['genero'],
            'email'            => $validated['email'],
            'password'         => Hash::make($validated['password']),
        ]);

        auth()->guard('colaborador')->login($colaborador);

        return redirect('/')->with('success', '¡Cuenta de colaborador creada y sesión iniciada exitosamente!');
    }
}
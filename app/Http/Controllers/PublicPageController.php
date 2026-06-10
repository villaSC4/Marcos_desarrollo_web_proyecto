<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprobanteCanjeMail;
use Illuminate\Support\Str;

class PublicPageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function canjes()
    {
        $productos = Producto::orderBy('costo_puntos', 'asc')->get();
        return view('pages.canjes', compact('productos'));
    }

    public function prensa()
    {
        $noticias = News::where('publicado', true)
                        ->orderBy('fecha_publicacion', 'desc')
                        ->get();

        return view('pages.prensa', compact('noticias'));
    }

    public function detalleNoticia($slug)
    {
        $noticia = News::where('slug', $slug)->firstOrFail();
        return view('pages.detalle-noticia', compact('noticia'));
    }

    public function reciclaCasa()
    {
        return view('pages.recicla-casa');
    }

    public function socios()
    {
        return view('pages.socios');
    }

    public function unete()
    {
        $actividades = \App\Models\Actividad::where('estado', '!=', 'Finalizado')
                                            ->orderBy('fecha_activity', 'asc')
                                            ->get();

        return view('pages.unete', compact('actividades'));
    }

    public function procesarCanje(Request $request, $id)
    {
        if (!auth()->guard('colaborador')->check()) {
            return back()->with('error', 'Debes iniciar sesión para poder realizar un canje.');
        }

        $colaborador = auth()->guard('colaborador')->user();
        $producto = Producto::findOrFail($id);

        if ($colaborador->puntos_acumulados < $producto->costo_puntos) {
            return back()->with('error', "No tienes suficientes puntos. Te faltan " . ($producto->costo_puntos - $colaborador->puntos_acumulados) . " puntos.");
        }

        $codigoCanje = 'REC-' . strtoupper(Str::random(4)) . '-' . strtoupper(Str::random(2));

        $colaborador->puntos_acumulados -= $producto->costo_puntos;
        $colaborador->save();

        try {
            Mail::to($colaborador->email)->send(new ComprobanteCanjeMail($colaborador, $producto, $codigoCanje));
            
            return back()->with('success', "¡Canje exitoso! Hemos enviado tu comprobante y tu código [{$codigoCanje}] a tu correo electrónico ({$colaborador->email}).");
        } catch (\Exception $e) {
            return back()->with('success', "¡Canje exitoso! Código: {$codigoCanje}. Sin embargo, no pudimos enviar el correo de confirmación.");
        }
    }

    public function participarActividad($id)
    {
        if (!auth()->guard('colaborador')->check()) {
            return redirect()->route('register')->with('error', '¡Primero debes registrarte o iniciar sesión para participar en las actividades!');
        }

        $colaborador = auth()->guard('colaborador')->user();
        $actividad = \App\Models\Actividad::findOrFail($id);

        if ($colaborador->actividades()->where('actividad_id', $id)->exists()) {
            return back()->with('error', 'Ya estás inscrito en esta actividad.');
        }

        $colaborador->actividades()->attach($actividad->id, [
            'asistio' => false 
        ]);

        return back()->with('success', "¡Excelente! Te has inscrito en: {$actividad->nombre}. Te esperamos.");
    }
    
}
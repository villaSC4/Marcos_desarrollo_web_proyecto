@extends('layouts.app') 

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
@endpush

@section('content')
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <header class="mb-4 text-center">
                <h1 class="titulo-detalle-noticia rc-bloque-negro-noticia text-white" style="font-weight: bold; font-family: 'Agbalumo', cursive;">
                    {{ $noticia->titulo }}
                </h1>
                <div class="fecha-detalle text-muted mb-3">
                    <i class="bi bi-calendar-event"></i> 
                    {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->translatedFormat('d \d\e F, Y') }}
                </div>
            </header>

            <div class="imagen-destacada-contenedor mb-5 text-center">
                <img src="{{ asset('storage/' . $noticia->imagen_portada) }}" 
                     class="img-fluid rounded shadow" 
                     alt="{{ $noticia->titulo }}"
                     style="max-height: 500px; width: 100%; object-fit: cover;">
            </div>

            <div class="contenido-noticia-detalle px-md-4">
                {!! $noticia->contenido !!}
            </div>

            <div class="mt-5 text-center">
                <a href="{{ route('prensa') }}" class="btn btn-outline-success rounded-pill px-4">
                    <i class="bi bi-arrow-left"></i> Volver a Prensa
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
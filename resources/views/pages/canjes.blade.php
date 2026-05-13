@extends('layouts.app')

@section('title', 'Productos de Canje')

@push('styles')
    {{-- Cargamos el CSS específico de esta página --}}
    <link rel="stylesheet" href="{{ asset('css/canjes.css') }}">
@endpush

@section('content')
<main>
    {{-- Elementos de decoración --}}
    <div class="decoracion">
        <img src="{{ asset('img/decoracion1.png') }}" class="esquina arriba-izquierda">
        <img src="{{ asset('img/decoracion1.png') }}" class="esquina arriba-derecha">
        <img src="{{ asset('img/decoracion2.png') }}" class="esquina abajo-izquierda">
        <img src="{{ asset('img/decoracion2.png') }}" class="esquina abajo-derecha">
    </div>

    <h1 class="etiqueta1">¡NUEVO!</h1>
    <h2 class="titulo-productos">CONOCE LOS</h2>
    <h3 class="etiqueta2">PRODUCTOS</h3>
    <h4 class="titulo3">A CANJEAR</h4>

    <p class="descripcion">
        Los usuarios podrán acumular puntos cada vez que reciclen productos en los puntos de reciclaje registrados.
        Estos puntos podrán ser canjeados por diferentes productos y beneficios ofrecidos por las empresas aliadas.
    </p>

    <section class="productos">
        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/shampoo.jpg') }}" alt="Yogurt"></div>
            <p class="nombre-prod">Shampoo</p>
            <p class="puntos">28 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/milo.jpg') }}" alt="Milo"></div>
            <p class="nombre-prod">Milo</p>
            <p class="puntos">10 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/ayudin.jpg') }}" alt="Ayudin"></div>
            <p class="nombre-prod">Ayudin</p>
            <p class="puntos">18 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/aceite.jpg') }}" alt="Aceite"></div>
            <p class="nombre-prod">Aceite</p>
            <p class="puntos">10 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/detergente.jpg') }}" alt="Detergente"></div>
            <p class="nombre-prod">Detergente</p>
            <p class="puntos">30 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/suaviante.jpg') }}" alt="Suavizante"></div>
            <p class="nombre-prod">Suavizante</p>
            <p class="puntos">35 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/desodorante.jpg') }}" alt="Desodorante"></div>
            <p class="nombre-prod">Desodorante</p>
            <p class="puntos">15 puntos</p>
        </div>

        <div class="producto">
            <div class="circulo"><img src="{{ asset('img/olivo.jpg') }}" alt="Aceite de Olivo"></div>
            <p class="nombre-prod">Aceite de Olivo</p>
            <p class="puntos">20 puntos</p>
        </div>
    </section>
</main>
@endsection
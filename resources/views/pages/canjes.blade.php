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
        @if($productos->isEmpty())
            {{-- Mensaje amigable por si aún no has registrado productos en Filament --}}
            <p class="descripcion" style="text-align: center; grid-column: 1 / -1; width: 100%;">
                Próximamente se añadirán nuevos productos para canje. ¡Sigue reciclando!
            </p>
        @else
            @foreach($productos as $producto)
                <div class="producto">
                    <div class="circulo">
                        @if($producto->imagen)
                            {{-- Carga la imagen desde el almacenamiento de Filament --}}
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                        @else
                            {{-- Imagen de respaldo por si un producto se guarda sin foto --}}
                            <img src="{{ asset('img/default-product.jpg') }}" alt="{{ $producto->nombre }}">
                        @endif
                    </div>
                    <p class="nombre-prod">{{ $producto->nombre }}</p>
                    <p class="puntos">{{ $producto->costo_puntos }} puntos</p>
                </div>
            @endforeach
        @endif
    </section>
</main>
@endsection
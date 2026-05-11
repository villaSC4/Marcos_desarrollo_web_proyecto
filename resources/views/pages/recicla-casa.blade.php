@extends('layouts.app')

@section('title', 'Recicla en Casa - Tottus')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/ReciclaCasa.css') }}">
@endpush

@section('content')
    <div class="rc-decoracion">
        <img src="{{ asset('img/deco1.png') }}" alt="decoracion 1" class="deco1" />
        <img src="{{ asset('img/deco1.png') }}" alt="decoracion 2" class="deco2" />
    </div>

    <main class="container py-5 text-center">
        <nav class="mb-5">
            <div class="rc-bloque-negro">RECICLA</div>
            <br />
            <div class="rc-bloque-negro grande">EN CASA</div>
            <p class="mt-3 rc-texto-guia">
                Haz click en cada habitación y aprende cómo reciclar sus envases y/o empaques paso a paso.
            </p>
        </nav>

        <section class="rc-casa-total mx-auto">
            <div class="rc-techo"></div>
            <nav class="rc-cuarto-grid">
                <div class="rc-celda" onclick="abrirPopUp(0)">
                    <img src="{{ asset('img/baño.webp') }}" alt="Baño" />
                    <div class="rc-capa"><h3>Baño</h3></div>
                </div>
                <div class="rc-celda" onclick="abrirPopUp(1)">
                    <img src="{{ asset('img/cuarto.webp') }}" alt="Cuarto" />
                    <div class="rc-capa"><h3>Dormitorio</h3></div>
                </div>
                <div class="rc-celda" onclick="abrirPopUp(2)">
                    <img src="{{ asset('img/cocina.avif') }}" alt="Cocina" />
                    <div class="rc-capa"><h3>Cocina</h3></div>
                </div>
                <div class="rc-celda" onclick="abrirPopUp(3)">
                    <img src="{{ asset('img/lavanderia.jpg') }}" alt="Lavanderia" />
                    <div class="rc-capa"><h3>Lavanderia</h3></div>
                </div>
            </nav>
            <div class="rc-suelo">TOMAR BEBIDAS ALCOHÓLICAS EN EXCESO ES DAÑINO</div>
        </section>

        <div class="rc-decoracion-2">
            <img src="{{ asset('img/deco2.png') }}" alt="decoracion 1" class="deco3" />
            <img src="{{ asset('img/deco2.png') }}" alt="decoracion 2" class="deco4" />
        </div>

        <section id="overlay" class="rc-overlay-centrado">
            <nav class="rc-cuadrante-info">
                <button class="rc-cerrar-x" onclick="cerrarPopUp()">&times;</button>
                <button class="rc-flecha-nav ant" onclick="navegar(-1)">&#10094;</button>
                <button class="rc-flecha-nav sig" onclick="navegar(1)">&#10095;</button>
                <div id="contenido-dinamico"></div>
            </nav>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/ReciclaCasa.js') }}"></script>
@endpush
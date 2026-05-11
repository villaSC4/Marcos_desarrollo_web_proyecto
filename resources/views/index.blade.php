@extends('layouts.app')

@section('title', 'Inicio - Recicla Consciente')

@section('content')

    <section class="recicla-hero">
        <div class="container d-flex align-items-center justify-content-between flex-wrap">
            <div class="hero-texto">
                <div class="etiquetas-container">
                    <span class="tag-en">EN</span>
                    <span class="tag-recicla">RECICLA</span>
                    <br>
                    <span class="tag-consciente">CONSCIENTE</span>
                </div>
                <p class="hero-descripcion">
                    Unimos empresas, municipalidades, recicladoras, y a ciudadanos como tú para cambiar esta realidad
                </p>
            </div>
            <div class="hero-imagen-wrapper">
                <img src="{{ asset('img/señora_inicio.png') }}" alt="Recicladora consciente" class="img-curva">
            </div>
        </div>
    </section>

    <section class="seccion-videos-casa">
        <div class="container text-center">
            <div class="rc-bloque-negro titulo-seccion">EN CASA</div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <div class="col">
                    <div class="contenedor-video">
                        <video controls poster="{{ asset('img/poster-video.jpg') }}">
                            <source src="{{ asset('video1.mp4') }}" type="video/mp4">
                            Tu navegador no soporta videos.
                        </video>
                        <p class="video-descripcion">Aprende a reciclar con los expertos</p>
                    </div>
                </div>
                <div class="col">
                    <div class="contenedor-video">
                        <video controls poster="{{ asset('img/poster-video.jpg') }}">
                            <source src="{{ asset('video2.mp4') }}" type="video/mp4">
                        </video>
                        <p class="video-descripcion">Aprende a reciclar con los expertos</p>
                    </div>
                </div>
                <div class="col">
                    <div class="contenedor-video">
                        <video controls poster="{{ asset('img/poster-video.jpg') }}">
                            <source src="{{ asset('video3.mp4') }}" type="video/mp4">
                        </video>
                        <p class="video-descripcion">Aprende a reciclar con los expertos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccion-estaciones">
        <div class="container text-center">
            <p class="texto-previo">Y DÉJALOS EN NUESTRAS</p>
            <div class="titulos-estaciones">
                <h2 class="bloque-verde">ESTACIONES</h2>
                <h2 class="bloque-oscuro">DE RECICLAJE</h2>
            </div>
            <div class="contenedor-estacion-img">
                <img src="{{ asset('img/estaciones.png') }}" alt="Estación de Reciclaje" class="img-fluida">
            </div>
        </div>
    </section>

    <section class="contenedor-papel">
        <div class="tarjeta-informativa">
            <div class="encabezado-azul">
                <h2 class="titulo-verde">Papel y Cartón</h2>
            </div>
            <div class="cuerpo-imagen">
                <img src="{{ asset('img/recicla.png') }}" alt="Información sobre reciclaje de papel" class="img-contenido">
            </div>
        </div>
    </section>

    <section class="seccion-listado-sedes py-5">
        <div class="container">
            <div class="text-center mb-5">
                <p class="texto-ubica">UBICA NUESTRAS</p>
                <div class="rc-bloque-negro titulo-estaciones">ESTACIONES</div>
                <br>
                <div class="rc-bloque-negro titulo-estaciones">DE RECICLAJE</div>
            </div>

            <div class="mapa-placeholder mb-5">
                <img src="{{ asset('img/mapa.png') }}" alt="Mapa de sedes" class="img-fluid w-100">
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @php
                    $sedes = [
                        ['nombre' => 'SEDE AGUSTINO', 'img' => 'estacion1 (1).png'],
                        ['nombre' => 'SEDE SAN CARLOS', 'img' => 'estacion1 (2).png'],
                        ['nombre' => 'SEDE LAS LOMAS', 'img' => 'estacion1 (3).png'],
                        ['nombre' => 'SEDE SAN MARTÍN', 'img' => 'estacion1 (4).png'],
                        ['nombre' => 'SEDE CAJA DE AGUA', 'img' => 'estacion1 (5).png'],
                        ['nombre' => 'SEDE PIRÁMIDE', 'img' => 'estacion1 (6).png'],
                    ];
                @endphp

                @foreach($sedes as $sede)
                <div class="col">
                    <div class="tarjeta-sede">
                        <div class="contenedor-img-estacion">
                            <img src="{{ asset('img/' . $sede['img']) }}" alt="{{ $sede['nombre'] }}">
                        </div>
                        <div class="nombre-sede-bloque">{{ $sede['nombre'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <button class="btn-carga-mas">CARGA MÁS</button>
            </div>
        </div>
    </section>

    <section class="seccion-impacto">
        <div class="container h-100 d-flex flex-column align-items-center justify-content-center text-center">
            <p class="texto-impacto-superior">Durante el 2025, juntos reciclamos</p>
            <h2 class="cifra-reciclaje">123.456 kg</h2>
        </div>
    </section>

    <section class="seccion-gracias py-5">
        <div class="container text-center">
            <h2 class="titulo-gracias">¡GRACIAS!</h2>
            <p class="texto-apoyo mx-auto">
                Con tu apoyo logramos reducir el consumo de recursos naturales y compensamos al planeta de la siguiente manera,
            </p>

            <div class="row row-cols-2 row-cols-md-5 g-4 justify-content-center mt-5">
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-tree"></i></div>
                        <p class="impacto-label">Número de árboles</p>
                        <p class="impacto-valor">655</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-tint"></i></div>
                        <p class="impacto-label">Agua ahorrada</p>
                        <p class="impacto-valor">1,002 m3</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-cloud"></i></div>
                        <p class="impacto-label">CO2 no emitido</p>
                        <p class="impacto-valor">+63,308 kg</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-gas-pump"></i></div>
                        <p class="impacto-label">Petróleo ahorrado</p>
                        <p class="impacto-valor">12,564 lt</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-bolt"></i></div>
                        <p class="impacto-label">Energía ahorrada</p>
                        <p class="impacto-valor">+499,724 Kwh</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
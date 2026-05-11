@extends('layouts.app')

@section('title', 'Únete al Reciclaje - Recicla Consciente')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/unete.css') }}">
@endpush

@section('content')
<main>
    <section class="seccion-inscripcion">
        <div class="banner-superior-verde">
            <img src="{{ asset('img/plantadecorativa.webp') }}" class="planta-decorativa left" alt="Planta decorativa izquierda"/>
            <img src="{{ asset('img/plantadecorativa.webp') }}" class="planta-decorativa right" alt="Planta decorativa derecha">
            
            <div class="header-sticker">
                <span class="txt-unete">¡ÚNETE</span>
                <h2 class="txt-reciclaje">AL RECICLAJE!</h2>
            </div>

            <div class="container text-center text-white mt-4">
                <p>Sé parte de #ReciclaConsciente llevando tus envases reciclables a las estaciones de reciclaje de Plaza Vea, Vivanda y Makro.</p>
                <p>Todos los residuos reciclables son gestionados por las Asociaciones de Recicladores formales que trabajan con las municipalidades aliadas de #ReciclaConsciente.</p>
            </div>
        </div>
        
        <section class="seccion-inscripcion-bloque">
            <div class="franja-inferior-verde">
                <div class="bloque-inscripcion">
                    <p class="texto llamado">
                        Te invitamos a conocerlas y a inscribirte al programa municipal de reciclaje de tu distrito, para junt@s seguir cuidando nuestro planeta.
                    </p>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeM3T5No9J6aG7DRGULVwy5vZYUXTi98kVI5XIE5g_yLa2x9A/viewform?usp=publish-editor" target="_blank" class="boton-sticker-verde">
                        INSCRÍBETE AQUÍ
                    </a>
                </div>
            </div>
            <img src="{{ asset('img/Persona.webp') }}" alt="Persona Limpiando" class="img-persona">
        </section>
    </section>

    <section class="seccion-aliados py-5">
        <div class="text-center">
            <h2 class="contenedor-titulo-aliados">MUNICIPALIDADES</h2>
            <span class="sticker-aliados">ALIADAS</span>
        </div>

        <div class="grid-logos mt-5">
            <div class="circulo-logo"><img src="{{ asset('img/MUNILIMA.webp') }}" alt="Muni Lima"></div>
            <div class="circulo-logo"><img src="{{ asset('img/MUNILINCE.webp') }}" alt="Muni Lince"></div>
            <div class="circulo-logo"><img src="{{ asset('img/MUNIRIMAC.webp') }}" alt="Muni Rimac"></div>
            <div class="circulo-logo"><img src="{{ asset('img/MUNISJL.webp') }}" alt="Muni SJL"></div>
            <div class="circulo-logo"><img src="{{ asset('img/MUNIVICTORIA.webp') }}" alt="Muni La Victoria"></div>
            <div class="circulo-logo"><img src="{{ asset('img/SanBorja.webp') }}" alt="Muni San Borja"></div>
        </div>
    </section>
</main>
@endsection
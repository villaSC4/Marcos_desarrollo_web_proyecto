@extends('layouts.app')

@section('title', 'Socios y Aliados - Recicla Consciente')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/StyleSocios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
@endpush

@section('content')
<main class="text-center py-5">
    <h1 class="etiqueta1">CONOCE A NUESTROS </h1>

    <h2 class="etiqueta2"><span>SOCIOS Y ALIADOS</span></h2>
    
    <div class="mt-5">
        <h2 class="titulo3">SOCIOS</h2>
        <section class="Socios">
            <div class="Socio">
                <img src="{{ asset('img/Socios1.png') }}" alt="Socio 1">
            </div>
            <div class="Socio">
                <img src="{{ asset('img/Socios1.png') }}" alt="Socio 1 duplicado">
            </div>
        </section>
    </div>
    
    <div class="mt-5">
        <h2 class="titulo3">ALIADOS</h2>
        <section class="Socios">
            <div class="Socio">
                <img src="{{ asset('img/Socios2.png') }}" alt="Aliado 1">
            </div>
        </section>
    </div>
</main>
@endsection
@extends('menu')

@section('contenido')
    <section class="mascota-container mt-6">
        <div class="mascota-box">
            <div class="mascota-box__img-container">
                <img class="mascota-box__img-logo" src="{{ asset('img/logo-huella.png') }}" alt="">
            </div>
            <ul class="mascota-box__principal-data mt-4">
                <li>
                    <label for="">Nombre:</label>
                    <p>{{ $mascota->nombre }}</p>
                </li>
                <li>
                    <label for="">Sexo:</label>
                    <p>{{ $mascota->sexo }}</p>
                </li>
                <li>
                    <label for="">Color:</label>
                    <p>{{ $mascota->color }}</p>
                </li>
                <li>
                    <label for="">Raza:</label>
                    <p>{{ $mascota->raza }}</p>
                </li>
                <li>
                    <label for="">Especie:</label>
                    <p>{{ $mascota->especie->especie }}</p>
                </li>
            </ul>

        </div>
        <div class="mascota-box mascota-box__complement-data">
            a
        </div>
    </section>
@endsection

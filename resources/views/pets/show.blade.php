@extends('layout.admin')

@section('contenido')
    <section class="mascota-container mt-6">
        <div class="mascota-box">
            <div class="mascota-box__img-container">
                <img class="mascota-box__img-logo" src="{{ asset('img/logo-huella.png') }}" alt="">
            </div>
            <ul class="mascota-box__principal-data mt-4">
                <li>
                    <label for="">Nombre:</label>
                    <p>{{ $pet->name }}</p>
                </li>
                <li>
                    <label for="">Sexo:</label>
                    <p>{{ $pet->sex }}</p>
                </li>
                <li>
                    <label for="">Color:</label>
                    <p>{{ $pet->color }}</p>
                </li>
                <li>
                    <label for="">Raza:</label>
                    <p>{{ $pet->race }}</p>
                </li>
                <li>
                    <label for="">Especie:</label>
                    <p>{{ $pet->specie->specie }}</p>
                </li>
            </ul>

        </div>
        <div class="mascota-box mascota-box__complement-data">
            <div class="mascota-box__data">
                <h2 class="mascota-box__data__titulo">Historias Clinicas</h2>
                <div class="mascota-box__data__content">
                    <div class="mascota-box__data__content__left">
                        <div class="mascota-box__data__number">
                            <label for="">Numero:</label>
                            <span>1</span>
                        </div>
                        <div class="mascota-box__data__time">
                            <label for="">Fecha:</label>
                            <span>28/04/2022 23:43</span>
                        </div>
                    </div>
                    <div class="mascota-box__data__content__right">
                        <button class="mascota-box__data__button">
                            Ver Detalle
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

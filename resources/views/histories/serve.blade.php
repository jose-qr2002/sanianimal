@extends('layout.admin')

@section('contenido')
<x-card title="Atender Cliente" class="mt-8 mb-8 max-w-md m-auto">
    <form action="{{ route('histories.serve') }}" method="GET">
        <p class="form__subtitle">Ingrese el DNI para verificar sus datos</p>
        <div class="form__input-group">
            <label for="searchParameter" class="form__label">Parametro:</label>
            <input id="searchParameter" name="searchParameter" type="text" class="form__input" value="{{ request('searchParameter') }}">
        </div>

        <button type="submit" class="form__button-submit">Buscar</button>
    </form>

    
</x-card>

@isset($pets)
    @if (!$pets->count())
        <div class="alert-card">
            <p class="alert-card__text">No se encontraron mascotas</p>
            <a target="_blank" href="{{ route('pets.create') }}" class="alert-card__button">Registrar Mascota</a>
        </div>
    @else
        <x-card title="MASCOTAS" class="">
            <div class="found-pets">
                @foreach ($pets as $pet)
                    <div class="pet-card">
                        <div class="pet-card__back"></div>
                        <img class="pet-card__img" src="{{ asset('img/profile/'. strtolower($pet->specie->specie) .'.png') }}" alt="">
                        <h3 class="pet-card__name">{{$pet->name}}</h3>
                        <p class="pet-card__sex">{{$pet->sex}}</p>
                        <p class="pet-card__history">{{ $pet->historie?->number ?? 'SIN HISTORIA'}}</p>
                        <p class="pet-card__owner">{{ $pet->customer->name}} {{ $pet->customer->lastname}} <span>91716696</span></p>
                        <div class="pet-card__buttons">
                            <a href="{{ route('pets.show', $pet) }}" target="_blank" class="pet-card__button--yellow">INFORMACION</a>
                            <a href="{{ route('histories.create', $pet) }}" class="pet-card__button">CREAR HISTORIA</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
    @endif
@endisset

@endsection

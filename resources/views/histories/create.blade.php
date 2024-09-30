@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Historia Clinica" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('histories.store') }}" method="POST" novalidate>
        @csrf
        <fieldset class="form__fieldset">
            <legend class="form__legend">Historia Clinica</legend>
            <div class="form__input-group">
                <label class="form__label" for="number">Numero:</label>
                <input class="form__input" type="text" id="number" name="number" value="{{ old('number', $lastNumber) }}">
                @error('number')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información de la mascota</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="pet">Nombre:</label>
                    <input class="form__input" type="text" id="pet"value="{{ $pet->name }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="specie">Especie:</label>
                    <input class="form__input" type="text" id="specie" value="{{  $pet->specie->specie }}" disabled>
                </div>
            </div>
            <input type="hidden" name="pet_id" value="{{ old('pet_id', $pet->id) }}">
            @error('pet_id')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="customer">Nombre:</label>
                    <input class="form__input" type="text" id="customer" value="{{ $pet->customer->name }} {{ $pet->customer->lastname }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="phone">Celular:</label>
                    <input class="form__input" type="text" id="phone" value="" disabled>
                </div>
            </div>
        </fieldset>
        
        <button class="form__button-submit" type="submit">Empezar Historia</button>
    </form>
</x-card>
@endsection
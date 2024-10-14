@extends('layout.admin')

@section('contenido')
<x-card title="Editar Historia Clinica" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('histories.update', $history->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <fieldset class="form__fieldset">
            <legend class="form__legend">Historia Clinica</legend>
            <div class="form__input-group">
                <label class="form__label" for="number">Numero:</label>
                <input class="form__input" type="text" id="number" name="number" value="{{ old('number', $history->number) }}">
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
                    <input class="form__input" type="text" id="pet"value="{{ $history->pet->name }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="specie">Especie:</label>
                    <input class="form__input" type="text" id="specie" value="{{  $history->pet->specie->specie }}" disabled>
                </div>
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="customer">Nombres:</label>
                    <input class="form__input" type="text" id="customer" value="{{ $history->pet->customer->name }} {{ $history->pet->customer->lastname }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="phone">Celular:</label>
                    <input class="form__input" type="text" id="phone" value="{{ $history->pet->customer->phone }}" disabled>
                </div>
            </div>
        </fieldset>
        
        <button class="form__button-submit" type="submit">Actualizar Historia</button>
    </form>
</x-card>
@endsection
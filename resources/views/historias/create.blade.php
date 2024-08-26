@extends('menu')


@section('contenido')
<x-card title="Registro de Historias" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="" method="POST" novalidate>
        @csrf
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del Dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="nombre">Nombres:</label>
                    <input class="form__input" type="text" id="nombre" name="nombre" value="" required>
                    @error('nombre')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="apellido">Documento:</label>
                    <input class="form__input" type="text" id="apellido" name="apellido" required>
                    @error('apellido')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información de la Mascota</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="nombre">Nombres:</label>
                    <input class="form__input" type="text" id="nombre" name="nombre" value="" required>
                    @error('nombre')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="apellido">Raza:</label>
                    <input class="form__input" type="text" id="apellido" name="apellido" required>
                    @error('apellido')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </fieldset>

        <fieldset class="form__fieldset">
            <legend class="form__legend">Detalles de la Consulta</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="nombre">Numero:</label>
                    <input class="form__input" type="text" id="nombre" name="nombre" value="" required>
                    @error('nombre')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="apellido">Precio:</label>
                    <input class="form__input" type="text" id="apellido" name="apellido" required>
                    @error('apellido')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="motivo">Motivo</label>
                <textarea class="form__input" type="text" id="motivo" name="motivo"></textarea>
                @error('motivo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="motivo">Muscosas</label>
                <textarea class="form__input" type="text" id="motivo" name="motivo"></textarea>
                @error('motivo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="motivo">Anamnesis</label>
                <textarea class="form__input" type="text" id="motivo" name="motivo"></textarea>
                @error('motivo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="motivo">Diagnostico</label>
                <textarea class="form__input" type="text" id="motivo" name="motivo"></textarea>
                @error('motivo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="motivo">Tratamiento</label>
                <textarea class="form__input" type="text" id="motivo" name="motivo"></textarea>
                @error('motivo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </fieldset>

        <button class="form__button-submit" type="submit">Registrar Cliente</button>
    </form>
</x-card>
@endsection

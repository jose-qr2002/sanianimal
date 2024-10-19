@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Cliente" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('customers.store') }}" method="POST" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="lastname">Apellido:</label>
                <input class="form__input @error('lastname') form__input-error @enderror" type="text" id="lastname" name="lastname" value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group-3">
            <div class="form__input-group">
                <label class="form__label" for="n_document">Número de documento:</label>
                <input class="form__input @error('n_document') form__input-error @enderror" type="text" id="n_document" name="n_document" value="{{ old('n_document') }}">
                @error('n_document')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="phone">Celular:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="sex">Sexo:</label>
                <select class="form__input @error('sex') form__input-error @enderror" id="sex" name="sex">
                    <option value="" disabled selected>-- SELECCIONAR --</option>
                    <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('sex') == 'M' ? 'selected' : '' }}>Femenino</option>
                </select>
                @error('sex')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="email">Correo electrónico:</label>
                <input class="form__input @error('email') form__input-error @enderror" type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="birthdate">Fecha de nacimiento:</label>
                <input class="form__input @error('birthdate') form__input-error @enderror" type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
                @error('birthdate')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__input-group">
            <label class="form__label" for="address">Dirección:</label>
            <input class="form__input @error('address') form__input-error @enderror" type="text" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="form__button-submit" type="submit">Registrar Cliente</button>
    </form>
</x-card>
@endsection

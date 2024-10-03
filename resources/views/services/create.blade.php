@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Servicio" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('services.store') }}" method="POST" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre del servicio:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="price">Precio:</label>
                <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="description">Descripción:</label>
                <textarea class="form__input @error('description') form__input-error @enderror" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <button class="form__button-submit" type="submit">Registrar Servicio</button>
    </form>
</x-card>
@endsection

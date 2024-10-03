@extends('layout.admin')

@section('contenido')
<x-card title="Editar Servicio" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('services.update', $service) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                @error('name')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="price">Precio:</label>
                <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" name="price" value="{{ old('price', $service->price) }}" required>
                @error('price')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="description">Descripción:</label>
                <input class="form__input @error('description') form__input-error @enderror" type="text" id="description" name="description" value="{{ old('description', $service->description) }}" required>
                @error('description')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">Actualizar Servicio</button>
    </form>
</x-card>
@endsection

@extends('layout.admin')

@section('contenido')
<x-card title="Editar Medicamento" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('medications.update', $medication) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{ old('name', $medication->name) }}" required>
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="brand">Marca:</label>
                <input class="form__input @error('brand') form__input-error @enderror" type="text" id="brand" name="brand" value="{{ old('brand', $medication->brand) }}" required>
                @error('brand')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="stock">Stock:</label>
                <input class="form__input @error('stock') form__input-error @enderror" type="text" id="stock" name="stock" value="{{ old('stock', $medication->stock) }}" required>
                @error('stock')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="price">Precio:</label>
                <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" name="price" value="{{ old('price', $medication->price) }}" required>
                @error('price')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div>
            <div class="form__input-group">
                <label class="form__label" for="description">Descripcion:</label>
                <textarea class="form__input @error('description') form__input-error @enderror" id="description" name="description">{{old('description', $medication->description)}}</textarea>
                @error('description')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">Registrar medication</button>
    </form>
</x-card>
@endsection

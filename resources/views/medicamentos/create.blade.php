@extends('menu')


@section('contenido')
<div class="card mt-8 mb-8 max-w-screen-md m-auto">
    <h2>Registro de Medicamentos:</h2>
    <form class="form" action="{{ route('medicamentos.store') }}" method="POST" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="marca">Marca:</label>
                <input class="form__input" type="text" id="marca" name="marca" value="{{ old('marca') }}" required>
                @error('marca')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="stock">Stock:</label>
                <input class="form__input" type="text" id="stock" name="stock" value="{{ old('stock') }}" required>
                @error('stock')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="precio">Precio:</label>
                <input class="form__input" type="text" id="precio" name="precio" value="{{ old('precio') }}" required>
                @error('precio')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div>
            <div class="form__input-group">
                <label class="form__label" for="descripcion">Descripcion:</label>
                <textarea class="form__input" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
                @error('descripcion')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">Registrar Medicamento</button>
    </form>
</div>
@endsection
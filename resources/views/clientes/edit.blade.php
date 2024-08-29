@extends('layout.admin')

@section('contenido')
<x-card title="Editar CLiente" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('clientes.update', $cliente->id) }}" method="POST" novalidate>
        @method('PUT')
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input @error('nombre') form__input-error @enderror" type="text" id="nombre" name="nombre" value="{{old('nombre',$cliente->nombre)}}" required>
                @error('nombre')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="apellido">Apellido:</label>
                <input class="form__input @error('apellido') form__input-error @enderror" type="text" id="apellido" name="apellido" value="{{old('apellido',$cliente->apellido)}}" required>
                @error('apellido')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="n_documento">Número de documento:</label>
                <input class="form__input @error('n_documento') form__input-error @enderror" type="text" id="n_documento" name="n_documento" value="{{old('n_documento',$cliente->n_documento)}}" required>
                @error('n_documento')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="sexo">Sexo:</label>
                <select class="form__input @error('sexo') form__input-error @enderror" id="sexo" name="sexo" required>
                    <option value="M" {{old('sexo',$cliente->sexo) == "M" ? 'selected' : ''}}>Masculino</option>
                    <option value="F" {{old('sexo'.$cliente->sexo) == "F" ? 'selected' : ''}}>Femenino</option>
                </select>
                @error('sexo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="email">Correo electrónico:</label>
                <input class="form__input @error('email') form__input-error @enderror" type="email" id="email" name="email" value="{{old('email',$cliente->email)}}">
                @error('email')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input class="form__input @error('fecha_nacimiento') form__input-error @enderror" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$cliente->fecha_nacimiento}}">
                @error('fecha_nacimiento')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__input-group">
            <label class="form__label" for="direccion">Dirección:</label>
            <input class="form__input @error('direccion') form__input-error @enderror" type="text" id="direccion" name="direccion" value="{{$cliente->direccion}}">
            @error('direccion')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="form__button-submit" type="submit">Guardar Cambios</button>
    </form>
</x-card>
@endsection

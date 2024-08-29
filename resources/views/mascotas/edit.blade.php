@extends('layout.admin')

@section('contenido')
<x-card title="Editar Mascota" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('mascotas.update', $mascota) }}" method="POST" autocomplete="off" novalidate>
        @csrf
        @method('PUT')
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input @error('nombre') form__input-error @enderror" type="text" id="nombre" name="nombre" value="{{old('nombre', $mascota->nombre)}}" required>
                @error('nombre')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group" id="campoCliente">
                <label class="form__label" for="cliente">Cliente:</label>
                <div class="form__relative">
                    <input class="form__input form__input-search @error('cliente_id') form__input-error @enderror" type="search" id="cliente" name="cliente" required value="{{old('cliente', $cliente->nombre . ' ' . $cliente->apellido . ' - ' . $cliente->n_documento)}}">
                    <input type="hidden" name="cliente_id" value="{{ old('cliente_id', $cliente->id) }}">
                    <ul class="form__predictions" id="clientePredicciones"></ul>
                </div>
                @error('cliente_id')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="sexo">Sexo</label>
                <select class="form__input @error('sexo') form__input-error @enderror" id="sexo" name="sexo" required>
                    <option value="Macho" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'selected' : '' }}>Macho</option>
                    <option value="Hembra" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                    <option value="Indefinido" {{ old('sexo', $mascota->sexo) == 'Indefinido' ? 'selected' : '' }}>Indefinido</option>
                </select>
                @error('sexo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="color">Color:</label>
                <input class="form__input @error('color') form__input-error @enderror" type="text" id="color" name="color" value="{{ old('color', $mascota->color) }}">
            </div>
            @error('color')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="especie_id">Especie</label>
                <select class="form__input @error('especie_id') form__input-error @enderror" id="especie_id" name="especie_id" required>
                    <option value="" disabled selected>-- Seleccione una especie --</option>
                    @foreach ($especies as $especie)
                        <option value="{{ $especie->id }}" {{ old('especie_id', $mascota->especie_id) == $especie->id ? 'selected' : ''}} >{{ $especie->especie }}</option>
                    @endforeach
                </select>
                @error('especie_id')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="raza">Raza:</label>
                <input class="form__input @error('raza') form__input-error @enderror" type="text" id="raza" name="raza" value="{{old('raza', $mascota->raza)}}">
                @error('raza')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="pedigree">Pedigree:</label>
                <select class="form__input @error('pedigree') form__input-error @enderror" id="pedigree" name="pedigree" required>
                    <option value="0" {{ old('pedigree', $mascota->pedigree) == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('pedigree', $mascota->pedigree) == '1' ? 'selected' : '' }}>Si</option>
                </select>
                @error('pedigree')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input class="form__input @error('fecha_nacimiento') form__input-error @enderror" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento) }}">
                @error('fecha_nacimiento')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        <button class="form__button-submit" type="submit">Modificar Macota</button>
    </form>
</x-card>

@endsection

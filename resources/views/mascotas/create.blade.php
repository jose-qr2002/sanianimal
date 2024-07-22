@extends('menu')


@section('contenido')
<div class="card mt-8 mb-8 max-w-screen-md m-auto">
    <h2>Registro de Mascotas</h2>
    <form class="form" action="{{ route('clientes.store') }}" method="POST" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" value="" required>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="apellido">Cliente:</label>
                <input class="form__input" type="search" id="apellido" name="apellido" required>

            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="n_documento">Sexo</label>
                <select class="form__input" id="sexo" name="sexo" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="sexo">Color:</label>
                <input class="form__input" type="email" id="email" name="email">
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="especie">Especie</label>
                <select class="form__input" id="pedigree" name="pedigree" required>
                    @foreach ($especies as $especie)
                        <option value="{{ $especie->especie }}">{{ $especie->especie }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="raza">Raza:</label>
                <input class="form__input" type="text" id="raza" name="raza">
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="pedigree">Pedigree:</label>
                <select class="form__input" id="pedigree" name="pedigree" required>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>
        </div>


        <button class="form__button-submit" type="submit">Registrar Macota</button>
    </form>
</div>
@endsection

@extends('menu')


@section('contenido')
<div class="card mt-8 mb-8 max-w-screen-md m-auto">
    <h2>Registro de Clientes</h2>
    <form class="form" action="/registrar_cliente" method="POST">
        @csrf
        <div class="form__group">
            <div>
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label class="form__label" for="apellido">Apellido:</label>
                <input class="form__input" type="text" id="apellido" name="apellido" required>
            </div>
        </div>
        <div class="form__group">
            <div>
                <label class="form__label" for="n_documento">Número de documento:</label>
                <input class="form__input" type="text" id="n_documento" name="n_documento" required>
            </div>
            <div>
                <label class="form__label" for="sexo">Sexo:</label>
                <select class="form__input" id="sexo" name="sexo" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>
        <div class="form__group">
            <div>
                <label class="form__label" for="email">Correo electrónico:</label>
                <input class="form__input" type="email" id="email" name="email">
            </div>
            <div>
                <label class="form__label" for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>
        </div>
        <div>
            <label class="form__label" for="direccion">Dirección:</label>
            <input class="form__input" type="text" id="direccion" name="direccion">
        </div>

        <button class="form__button-submit" type="submit">Registrar Cliente</button>
    </form>
</div>
@endsection
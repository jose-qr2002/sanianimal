@extends('menu')


@section('contenido')
<div class="card mt-8 mb-8 max-w-screen-md m-auto">
    <h2>Registro de Medicamentos:</h2>
    <form class="form" action="/registrar_med" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="apellido">Marca:</label>
                <input class="form__input" type="text" id="apellido" name="apellido" required>
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="n_documento">Stock:</label>
                <input class="form__input" type="text" id="n_documento" name="n_documento" required>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="sexo">Precio:</label>
                <input class="form__input" type="text" id="n_documento" name="n_documento" required>
            </div>
        </div>
        <div>
            <div class="form__input-group">
                <label class="form__label" for="descripcion">Descripcion:</label>
                <textarea class="form__input" id="descripcion" name="descripcion"></textarea>
            </div>
        </div>

        <button class="form__button-submit" type="submit">Registrar Medicamento</button>
    </form>
</div>
@endsection
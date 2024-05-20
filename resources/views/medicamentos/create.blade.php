@extends('menu')


@section('contenido')
<div class="card">
    <h2>Registro de Medicamentos:</h2>
    <form action="/registrar_med" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Marca:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="n_documento">Stock:</label>
            <input type="text" id="n_documento" name="n_documento" required>

            <label for="sexo">Precio:</label>
            <input type="text" id="n_documento" name="n_documento" required>

        <button type="submit">Registrar Medicamento</button>
    </form>
</div>
@endsection
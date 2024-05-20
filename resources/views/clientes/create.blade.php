@extends('menu')


@section('contenido')
<div class="card">
    <h2>Registro de Clientes</h2>
    <form action="/registrar_cliente" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="n_documento">Número de documento:</label>
            <input type="text" id="n_documento" name="n_documento" required>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

        <button type="submit">Registrar Cliente</button>
    </form>
</div>
@endsection
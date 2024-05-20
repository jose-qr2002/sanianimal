@extends('menu')

@section('contenido')
<h2 class="title-menu">Mascotas</h2>
<div class="table-header">
    <button><a href="{{ route('medicamentos.create') }}">Registrar</a></button>
    <div class="table-search">
        <input type="search" placeholder="Buscar">
        <i class="ri-search-line" id="search"></i>
    </div>
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dueño</th>
                <th>Especie</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mascotas as $mascota)
                <tr>
                    <td>{{$mascota->nombre}}</td>
                    <td>{{$mascota->cliente->nombre}}</td>
                    <td>{{$mascota->especie->especie}}</td>
                    <td>{{$mascota->color}}</td>
                    <td>
                        <i class="ri-file-edit-line edit-icon" id="icons"></i>
                        <i class="ri-delete-bin-line delete-icon" id="icons"></i>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No se encontraron mascotas registradas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="table-footer">
    <p>Total de Filas: 1</p>
</div>
@endsection
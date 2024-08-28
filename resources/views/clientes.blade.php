@extends('menu')

@section('contenido')
<h1 class="title-menu">Clientes</h1>
<div class="table-header">
    <a class="table-header__button" href="{{ route('clientes.create') }}">Registrar</a>
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
                <th>Apellido</th>
                <th>Documento</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->n_documento }}</td>
                    <td>{{ $cliente->sexo }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
                        <form onsubmit="window.confirmaEliminarCliente(event)" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="ri-delete-bin-line delete-icon icons"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay clientes</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

<div class="table-footer">
    <p>Total de Filas: 10</p>
</div>

@endsection

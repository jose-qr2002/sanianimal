@extends('menu')

@section('contenido')
<div class="table-header">
    <h2 class="table-title">Medicamentos</h2>
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
                <th>Marca</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->nombre }}</td>
                    <td>{{ $medicamento->marca }}</td>
                    <td>{{ $medicamento->stock }}</td>
                    <td>S/{{ $medicamento->precio }}</td>
                    <td>
                        <i class="ri-file-edit-line" id="icons"></i>
                        <i class="ri-delete-bin-line" id="icons"></i>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay medicamentos</td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
</div>

<div class="table-footer">
    <p>Total de Filas: 10</p>
</div>
@endsection
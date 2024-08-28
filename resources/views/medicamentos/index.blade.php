@extends('menu')

@section('contenido')
<h2 class="title-menu">Medicamentos</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('medicamentos.create') }}">Registrar</a>
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
                        <a href="{{ route('medicamentos.edit', $medicamento) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
                        <form onsubmit="confirmaEliminarMedicamento(event)" action="{{ route('medicamentos.destroy', $medicamento) }}" method="POST">
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
                    <td colspan="5">No hay medicamentos</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

<div class="table-footer">
    {{ $medicamentos->links() }}
</div>
@endsection

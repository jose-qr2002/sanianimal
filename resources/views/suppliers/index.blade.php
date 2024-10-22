@extends('layout.admin')
 
@section('contenido')
<h2 class="title-menu">Proveedores</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('suppliers.create') }}">Registrar</a>
    <form class="table-search" method="GET" action="{{ route('suppliers.index') }}">
        <input type="search" name="search" placeholder="Buscar" value="{{ request()->input('search') }}">
        <button type="submit">
            <i class="ri-search-line" id="search"></i>
        </button>
    </form>
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Ruc</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->ruc }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>
<a href="{{ route('suppliers.show', $supplier->id) }}">
                            <i class="ri-eye-fill show-icon icons"></i>
                        </a>
                        <a href="{{ route('suppliers.edit', $supplier) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay proveedores</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
 
<div class="table-footer">
    {{ $suppliers->links() }}
</div>
 
@endsection

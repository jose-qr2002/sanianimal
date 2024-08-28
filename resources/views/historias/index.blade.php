@extends('menu')

@section('contenido')
<h2 class="title-menu">Historias Clinicas</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('historias.atenderCliente') }}">Nueva Atencion</a>
    <div class="table-search">
        <input type="search" placeholder="Buscar">
        <i class="ri-search-line" id="search"></i>
    </div>
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Dueño</th>
                <th>Mascota</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($historias as $historia)
                <tr>
                    <td>{{$historia->numero}}</td>
                    <td>{{$historia->mascota->cliente->nombre}}</td>
                    <td>{{$historia->mascota->nombre}}</td>
                    <td>{{$historia->fecha}}</td>
                    <td>

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
    {{ $historias->links() }}
</div>

@endsection

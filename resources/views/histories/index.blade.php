@extends('layout.admin')

@section('contenido')
<h2 class="title-menu">Historias Clinicas</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('histories.serve') }}">Nueva Atencion</a>
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($histories as $history)
                <tr>
                    <td>{{$history->number}}</td>
                    <td>{{$history->pet->customer->name}}</td>
                    <td>{{$history->pet->name}}</td>
                    <td>
                        <a href="{{ route('histories.edit', $history) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
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
    {{ $histories->links() }}
</div>

@endsection

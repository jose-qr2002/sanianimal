@extends('layout.admin')

@section('contenido')
<h2 class="title-menu">Historias Clinicas</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('histories.serve') }}">Nueva Atencion</a>
    <div class="table-search">
        <form action="{{ route('histories.index') }}" method="GET">
            <input type="search" name="parameter" placeholder="Buscar" value="{{ request('parameter') }}">
            <button type="submit">
                <i class="ri-search-line" id="search"></i>
            </button>
        </form>
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
                    <td>{{$history->pet->customer->getFullName()}}</td>
                    <td>{{$history->pet->name}}</td>
                    <td>
                        <a href="{{ route('histories.show', $history->id) }}"><i class="ri-eye-fill show-icon icons"></i></a>
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

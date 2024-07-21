@extends('menu')

@section('contenido')
<h2 class="title-menu">Medicamentos</h2>
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
                        <i class="ri-delete-bin-line delete-icon icons"></i>
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

@push('scripts')
    @session('msn_success')
        <script>
            let mensaje="{{ $value }}";

            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
@endpush
@endsection

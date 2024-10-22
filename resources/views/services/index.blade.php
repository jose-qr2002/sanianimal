@extends('layout.admin')
 
@section('contenido')
<h2 class="title-menu">Servicios</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('services.create') }}">Registrar</a>
    <form class="table-search" method="GET" action="{{ route('services.index') }}">
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
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>S/{{ $service->price }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
                        <form onsubmit="confirmaEliminarServicio(event)" action="{{ route('services.destroy', $service) }}" method="POST">
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
                    <td colspan="4">No hay servicios</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
 
<div class="table-footer">
    {{ $services->links() }}
</div>
 
@push('scripts')
    <script>
        function confirmaEliminarServicio(event){
            event.preventDefault();
            let form=event.target;
 
            Swal.fire({
                text: "¿Estás seguro de que deseas eliminar este servicio?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endpush
@endsection
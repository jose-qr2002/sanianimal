@extends('layout.admin')

@section('contenido')
<h2 class="title-menu">Mascotas</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('pets.create') }}">Registrar</a>
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
            @forelse ($pets as $pet)
                <tr>
                    <td>{{$pet->name}}</td>
                    <td>{{$pet->customer->name}}</td>
                    <td>{{$pet->specie->specie}}</td>
                    <td>{{$pet->color}}</td>
                    <td>
                        <a href="{{ route('pets.show', $pet->id) }}"><i class="ri-eye-fill show-icon icons"></i></a>
                        <a href="{{ route('pets.edit', $pet) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                        <form onsubmit="confirmaEliminarMascota(event)" action="{{ route('pets.destroy', $pet) }}" method="POST">
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
                    <td colspan="6">No se encontraron mascotas registradas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="table-footer">
    {{ $pets->links() }}
</div>


@push('scripts')
    <script>
        function confirmaEliminarMascota(event){
            event.preventDefault();
            let form=event.target;

            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar esta mascota?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
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


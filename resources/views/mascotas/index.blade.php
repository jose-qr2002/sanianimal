@extends('menu')

@section('contenido')
<h2 class="title-menu">Mascotas</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('mascotas.create') }}">Registrar</a>
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
            @forelse ($mascotas as $mascota)
                <tr>
                    <td>{{$mascota->nombre}}</td>
                    <td>{{$mascota->cliente->nombre}}</td>
                    <td>{{$mascota->especie->especie}}</td>
                    <td>{{$mascota->color}}</td>
                    <td>
                        <a href="{{ route('mascotas.show', $mascota->id) }}"><i class="ri-eye-fill show-icon icons"></i></a>
                        <a href="{{ route('mascotas.edit', $mascota) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                        <form onsubmit="confirmaEliminarMascota(event)" action="{{ route('mascotas.destroy', $mascota) }}" method="POST">
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
    <p>Total de Filas: 1</p>
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
    @session('msn_error')
        <script>
            let mensaje="{{ $value }}";

            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
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

@extends('layout.admin')

@section('contenido')
<h2 class="title-menu">Medicamentos</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('medications.create') }}">Registrar</a>
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
            @forelse ($medications as $medication)
                <tr>
                    <td>{{ $medication->name }}</td>
                    <td>{{ $medication->brand }}</td>
                    <td>{{ $medication->stock }}</td>
                    <td>S/{{ $medication->price }}</td>
                    <td>
                        <a href="{{ route('medications.edit', $medication) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
                        <form onsubmit="confirmaEliminarMedicamento(event)" action="{{ route('medications.destroy', $medication) }}" method="POST">
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
    {{ $medications->links() }}
</div>

@push('scripts')
    <script>
        function confirmaEliminarMedicamento(event){
            event.preventDefault();
            let form=event.target;

            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar este medicamento?",
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

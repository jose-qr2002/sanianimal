@extends('layout.admin')

@section('contenido')
<h1 class="title-menu">Clientes</h1>
<div class="table-header">
    <a class="table-header__button" href="{{ route('customers.create') }}">Registrar</a>
    <div class="table-search">
        <form action="{{ route('customers.index') }}" method="GET">
            <input type="search" name="parameter" placeholder="Buscar por nombre, apellido, documento o celular" value="{{ request('parameter') }}">
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
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Sexo</th>
                <th>Celular</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->lastname }}</td>
                    <td>{{ $customer->n_document }}</td>
                    <td>{{ $customer->sex }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                        <form onsubmit="confirmaEliminarCliente(event)" action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
                    <td colspan="6">No se encontraron clientes</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="table-footer">
    {{ $customers->links() }}
</div>

@push('scripts')
    <script>
        function confirmaEliminarCliente(event) {
            event.preventDefault();
            let form = event.target;

            Swal.fire({
                text: "¿Estás seguro de que deseas eliminar este cliente?",
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

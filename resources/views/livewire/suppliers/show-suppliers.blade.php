<div>
    <h1 class="title-menu">Proveedores</h1>
    <div class="table-header">
        <a class="table-header__button" href="{{ route('suppliers.create') }}">Registrar</a>
        <div class="table-search">
            <form wire:submit.prevent='searching'>
                <input type="search" wire:model='search' placeholder="Buscar">
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
                            <a href="{{ route('suppliers.edit', $supplier->id) }}">
                                <i class="ri-file-edit-line edit-icon icons"></i></a>
                            <a href="{{ route('suppliers.show', $supplier->id) }}">
                            <i class="ri-eye-fill show-icon icons"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No se encontraron proveedores</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="table-footer">
        {{ $suppliers->links() }}
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (customerId) => {

                    Swal.fire({
                        text: "¿Estás seguro de que deseas eliminar este proveedor?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí",
                        cancelButtonText: "No"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Eliminar el cliente
                            @this.call('deleteCustomer',customerId);
                        }
                    })
                });
            })
        </script>
    @endpush
</div>

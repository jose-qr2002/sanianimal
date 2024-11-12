<div>
    <h1 class="title-menu">Clientes</h1>
    <div class="table-header">
        <a class="table-header__button" href="{{ route('customers.create') }}">Registrar</a>
        <div class="table-search">
            <form wire:submit.prevent='searching'>
                <input type="search" wire:model='search' placeholder="Buscar por nombre, apellido, documento o celular">
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
                            <button wire:click="$dispatch('show-alert-delete', {{ $customer->id }})">
                                <i class="ri-delete-bin-line delete-icon icons"></i>
                            </button>
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
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (customerId) => {

                    Swal.fire({
                        text: "¿Estás seguro de que deseas eliminar este cliente?",
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

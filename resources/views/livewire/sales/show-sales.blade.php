<div>
    <h2 class="title-menu">Ventas</h2>
    <div class="table-header">
        <a class="table-header__button" href="{{ route('sales.create') }}">Registrar Venta</a>
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
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Descuento</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <td>{{ $sale->customer?->name }} {{ $sale->customer?->lastname }}</td>
                        <td>{{ $sale->date }}</td>
                        <td>S/{{ $sale->discount }}</td>
                        <td>S/{{ $sale->total }}</td>
                        <td>
                            <button wire:click="$dispatch('show-alert-delete', {{ $sale->id }})">
                                <i class="ri-delete-bin-line delete-icon icons"></i>
                            </button>
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
        {{ $sales->links() }}
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('show-alert-delete', (saleId) => {

                Swal.fire({
                    text: "¿Estás seguro de que deseas eliminar esta venta?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí",
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar el cliente
                        @this.call('deleteSale',saleId);
                    }
                })
            });
        })
    </script>
@endpush
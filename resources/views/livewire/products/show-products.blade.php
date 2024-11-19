<div>
<h2 class="title-menu">Productos</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('products.create') }}">Registrar</a>
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
                <th>Nombre</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>S/{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
                        <button wire:click="$dispatch('show-alert-delete', {{ $product->id }})">
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
    {{ $products->links() }}
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('show-alert-delete', (productId) => {
 
            Swal.fire({
                text: "¿Estás seguro de que deseas eliminar este producto?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deleteProduct',productId);
                }
            })
        });
    })
    </script>
@endpush
</div>
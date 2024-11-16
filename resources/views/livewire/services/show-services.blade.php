<div>
<h2 class="title-menu">Servicios</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('services.create') }}">Registrar</a>
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
                        <a href="{{ route('services.edit', $service->id) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                        <button wire:click="$dispatch('show-alert-delete', {{ $service->id }})">
                                <i class="ri-delete-bin-line delete-icon icons"></i>
                        </button>
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
        document.addEventListener('livewire:init', () => {
            Livewire.on('show-alert-delete', (serviceId) => {
 
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
                    @this.call('deleteService',serviceId);
                }
            })
        });
    })
    </script>
@endpush
</div>
<div>
    <h1 class="title-menu">Mascotas</h1>
    <div class="table-header">
        <a class="table-header__button" href="{{ route('pets.create') }}">Registrar</a>
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
                            <td>{{$pet->customer->name}}  {{ $pet->customer->lastname }}</td>
                            <td>{{$pet->specie->specie}}</td>
                            <td>{{$pet->color}}</td>
                        <td>
                            <a href="{{ route('pets.show', $pet->id) }}"><i class="ri-eye-fill show-icon icons"></i></a>
                            <a href="{{ route('pets.edit', $pet->id) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                            <button wire:click="$dispatch('show-alert-delete', {{ $pet->id }})">
                                <i class="ri-delete-bin-line delete-icon icons"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No se encontraron mascotas</td>
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
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (petId) => {

                    Swal.fire({
                        text: "¿Estás seguro de que deseas eliminar esta mascota?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí",
                        cancelButtonText: "No"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Eliminar el cliente
                            @this.call('deletePet',petId);
                        }
                    })
                });
            })
        </script>
    @endpush
</div>

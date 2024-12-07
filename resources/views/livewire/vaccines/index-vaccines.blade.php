<div>
<h2 class="title-menu">Vacunas</h2>
<div class="table-header">
    <a class="table-header__button" href="{{ route('vaccines.create') }}">Registrar</a>
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
                <th>Vacuna</th>
                <th>Stock</th>
                <th>Detalles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vaccines as $vaccine)
                <tr>
                    <td>{{ $vaccine->vaccine }}</td>
                    <td>{{ $vaccine->stock }}</td>
                    <td>{{ $vaccine->detail }}</td>
                    <td>
                        <a href="{{ route('vaccines.edit', $vaccine->id) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                        <button wire:click="$dispatch('show-alert-delete', {{ $vaccine->id }})">
                                <i class="ri-delete-bin-line delete-icon icons"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay vacunas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
 
<div class="table-footer">
    {{ $vaccines->links() }}
</div>
 
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('show-alert-delete', (vaccineId) => {
 
            Swal.fire({
                text: "¿Estás seguro de que deseas eliminar esta vacuna?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deleteVaccine',vaccineId);
                }
            })
        });
    })
    </script>
@endpush
</div>
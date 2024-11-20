<div>
<h2 class="title-menu">Historias Clinicas</h2>   
<div class="table-header">
    <a class="table-header__button" href="{{ route('histories.serve') }}">Nueva Atencion</a>
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
                <th>Nro</th>
                <th>Dueño</th>
                <th>Mascota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($histories as $history)
                <tr>
                    <td>{{$history->number}}</td>
                    <td>{{$history->pet->customer->getFullName()}}</td>
                    <td>{{$history->pet->name}}</td>
                    <td>
                        <a href="{{ route('histories.show', $history->id) }}"><i class="ri-eye-fill show-icon icons"></i></a>
                        <a href="{{ route('histories.edit', $history) }}">
                            <i class="ri-file-edit-line edit-icon icons"></i>
                        </a>
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
    {{ $histories->links() }}
</div>

</div>
@push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (historyId) => {
                    Swal.fire({
                        text: "¿Estás seguro de que deseas eliminar esta historia clínica?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí",
                        cancelButtonText: "No"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.call('deleteHistory', historyId);
                        }
                    });
                });
            });
        </script>
    @endpush
</div>

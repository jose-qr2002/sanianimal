<table class="table">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Temperatura</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($history->visits as $visit)
            <tr>
                <td>{{ $visit->date->toDateString() }}</td>
                <td>{{ $visit->time }}</td>
                <td>{{ $visit->temperature }}</td>
                <td>
                    <a href="{{ route('visits.edit', $visit->id) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                    <button wire:click="$dispatch('show-alert-delete', {{ $visit->id }})">
                        <i class="ri-delete-bin-line delete-icon icons"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (visitId) => {

                    Swal.fire({
                        text: "¿Estás seguro de que deseas eliminar esta visita?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí",
                        cancelButtonText: "No"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.call('deleteVisit',visitId);
                        }
                    })
                });
            })
        </script>
    @endpush
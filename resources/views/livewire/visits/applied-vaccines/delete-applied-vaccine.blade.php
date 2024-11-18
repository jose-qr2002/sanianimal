<div class="danger-zone">
    <p>El siguiente boton eliminara este registro</p>
    <button wire:click="$dispatch('show-alert-delete', {{ $appliedVaccine->id }})" class="form__button--red">Eliminar</button>
</div>

@push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (appliedVaccineId) => {

                    Swal.fire({
                        text: "¿Estás seguro de que deseas eliminar esta vacuna aplicada?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí",
                        cancelButtonText: "No"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.call('deleteAppliedVaccine',appliedVaccineId);
                        }
                    })
                });
            })
        </script>
    @endpush



<x-card class="supplier mt-8" >
    <div class="supplier__header">
        <p class="supplier__title">{{ $supplier->name }}</p>
        <p class="supplier__subtitle">RUC del Proveedor: {{ $supplier->ruc }}</p>
    </div>

    <div class="supplier__info">
        <div>
            <p>Información de Contacto</p>
            <ul>
                <li><i class="ri-mail-line"></i> {{ $supplier->email ?? 'Por agregar' }}</li>
                <li><i class="ri-phone-line"></i> {{ $supplier->phone }}</li>
                <li><i class="ri-map-pin-line"></i> {{ $supplier->address }}</li>
            </ul>
        </div>

        <div>
            <p>Detalles del Negocio</p>
            <ul>
                <li><i class="ri-briefcase-line"></i> Ocupación: {{ $supplier->occupation ?? 'Por agregar' }}</li>

                <li><i class="ri-calendar-fill"></i> Fecha de Registro: {{ $supplier->created_at ? $supplier->created_at->format('Y-m-d') : 'Por agregar' }}</li>

                <li><i class="ri-money-dollar-circle-line"></i> Total de Compras: S./ {{ $supplier->total_purchases ?? 'Por agregar' }}</li>

                <li>Última compra: {{ $supplier->last_purchase_date ?? 'Por agregar' }}</li>
            </ul>
        </div>
    </div>

    <div class="danger-zone mt-8">
        <p class="danger-zone__title">Zona Peligrosa</p>
        <div class="danger-zone__content">
            <i class="ri-error-warning-line"></i> Advertencia
            <div class="danger-zone__description">
                <p>Eliminar este proveedor es una acción irreversible. Todos los datos asociados se perderán permanentemente.</p>
            </div>
        </div>

        <button wire:click="$dispatch('show-alert-delete', {{ $supplier->id }})" class="form__button--red">Eliminar</button>

    </div>

</x-card>
@push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('show-alert-delete', (supplierId) => {

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
                            @this.call('deleteSupplier',supplierId);
                        }
                    })
                });
            })
        </script>
    @endpush
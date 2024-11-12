@extends('layout.admin')

@section('contenido')
<livewire:customers.show-customers />

@push('scripts')
    <script>
        function confirmaEliminarCliente(event) {
            event.preventDefault();
            let form = event.target;

            Swal.fire({
                text: "¿Estás seguro de que deseas eliminar este cliente?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endpush

@endsection

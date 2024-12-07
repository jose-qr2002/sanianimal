@extends('layout.admin')
 
@section('contenido')
<livewire:vaccines.index-vaccines />

@push('scripts')
    <script>
        function confirmaEliminarProducto(event){
            event.preventDefault();
            let form=event.target;
 
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
                    form.submit();
                }
            });
        }
    </script>
@endpush
@endsection
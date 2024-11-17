@extends('layout.admin')

@section('contenido')
<x-card title="Editar Vacuna Aplicada" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:visits.applied_vaccines.edit-applied-vaccine :appliedVaccine='$appliedVaccine'/>
</x-card>
<x-card title="" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form onsubmit="confirmateDeleteAppliedVaccine(event)" action="{{ route('visits.destroy.vaccine', [$visit, $appliedVaccine]) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="danger-zone">
            <p>El siguiente boton eliminara este registro</p>
            <button type="submit" class="form__button--red">Eliminar</button>
        </div>
    </form>
</x-card>


@push('scripts')
    <script>
        function confirmateDeleteAppliedVaccine(event){
            event.preventDefault();
            let form=event.target;

            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar esta vacuna aplicada?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
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
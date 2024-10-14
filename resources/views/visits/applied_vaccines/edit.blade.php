@extends('layout.admin')

@section('contenido')
<x-card title="Editar Vacuna Aplicada" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('visits.update.vaccine', [$visit, $appliedVaccine]) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form__input-group">
            <label class="form__label" for="vaccine_id">Vacuna:</label>
            <select class="form__input" name="vaccine_id" id="vaccine_id">
                @foreach ($vaccines as $vaccine)
                    <option value="{{ $vaccine->id }}" {{ $vaccine->id === old('vaccine_id', $appliedVaccine->vaccine_id) ? 'selected' : '' }}>{{ $vaccine->vaccine }}</option>
                @endforeach
            </select>
            @error('vaccine_id')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form__input-group">
            <label class="form__label" for="observation">Observación:</label>
            <textarea class="form__input @error('observation') form__input-error @enderror" id="observation" name="observation" >{{ old('observation', $appliedVaccine->observation) }}</textarea>
            @error('observation')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="form__button-submit" type="submit">Actualizar Vacuna Aplicada</button>
    </form>
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
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
@endsection
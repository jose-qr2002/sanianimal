@extends('layout.admin')


@section('contenido')
<x-card title="Registrar Historia" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" id="history-form" action="{{ route('histories.store') }}" method="POST" novalidate>
        @csrf
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del Dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="customer">Nombres:</label>
                    <input class="form__input" type="text" id="customer"value="{{ $customer->name . ' ' . $customer->lastname }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="document">Documento:</label>
                    <input class="form__input" type="text" id="document" value="{{ $customer->n_document }}" disabled>
                </div>
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información de la Mascota</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="pet_id">Mascota:</label>
                    <select class="form__input @error('pet_id') form__input-error @enderror" name="pet_id" id="pet_id">
                        <option disabled selected>-- Seleccione una mascota --</option>
                        @foreach ($customer->pets as $pet)
                            <option value="{{ $pet->id }}" {{ old('pet_id') == $pet->id ? 'selected' : '' }} >{{ $pet->name }}</option>
                        @endforeach
                    </select>
                    @error('pet_id')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="weight">Peso(kg):</label>
                    <input class="form__input @error('weight') form__input-error @enderror" type="text" id="weight" name="weight" value="{{ old('weight') }}" required>
                    @error('weight')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </fieldset>

        <fieldset class="form__fieldset">
            <legend class="form__legend">Detalles de la Consulta</legend>
            <div class="form__group-3">
                <div class="form__input-group">
                    <label class="form__label" for="number">Número:</label>
                    <input class="form__input @error('number') form__input-error @enderror" type="text" id="number" name="number" value="{{ old('number',$lastNumber) }}" required>
                    @error('number')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="price">Precio:</label>
                    <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="date">Fecha:</label>
                    <input class="form__input @error('date') form__input-error @enderror" type="date" id="date" name="date" value="{{ old('date') }}" required>
                    @error('date')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="reason">Motivo</label>
                <textarea class="form__input @error('reason') form__input-error @enderror" type="text" id="reason" name="reason">{{old('reason')}}</textarea>
                @error('reason')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="mucous">Mucosas</label>
                <textarea class="form__input @error('mucous') form__input-error @enderror" type="text" id="mucous" name="mucous">{{old('mucous')}}</textarea>
                @error('mucous')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="amnanesis">Anamnesis</label>
                <textarea class="form__input @error('amnanesis') form__input-error @enderror" type="text" id="amnanesis" name="amnanesis">{{old('amnanesis')}}</textarea>
                @error('amnanesis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="diagnosis">Diagnostico:</label>
                <textarea class="form__input @error('diagnosis') form__input-error @enderror" type="text" id="diagnosis" name="diagnosis">{{old('diagnosis')}}</textarea>
                @error('diagnosis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="treatment">Tratamiento:</label>
                <textarea class="form__input @error('treatment') form__input-error @enderror" type="text" id="treatment" name="treatment">{{old('treatment')}}</textarea>
                @error('treatment')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </fieldset>
        
        <fieldset class="form__fieldset">
            <legend class="form__legend">Vacunas</legend>
            <input type="hidden" id="vaccines" name="vaccines" value="{{ old('vaccines') != null ? json_encode(old('vaccines')) : '' }}"> 
            @if (old('vaccines'))
                @php
                    $errorsMessages = $errors->getMessages();

                    // Filtra los errores relacionados con 'vaccines'
                    $vaccinesErrors = [];
                    // Recorrer los errores
                    foreach ($errorsMessages as $key => $messages) {

                        $messagePrincipal = $messages[0];
                        // Verifica si es una mensaje por parte de vaccines
                        if (strpos($key, 'vaccines.') === 0) {
                            
                            // Separa por puntos para obtener el numero
                            $keyParts = explode(".", $key);

                            // Guardar el mensaje 
                            $vaccinesErrors[$keyParts[1]][$keyParts[2]] = $messagePrincipal;
                        }
                    }

                    // Convierte los errores a formato JSON
                    $vaccinesErrorsJson = json_encode($vaccinesErrors);
                @endphp
            @endif
            <input type="hidden" name="vaccines_errors" id="vaccines_errors" value="{{ isset($vaccinesErrorsJson) ? $vaccinesErrorsJson : ''}}">
            <ul id="vaccine-section">

            </ul>

            <button type="button" class="form__button" id="button-vaccine">Agregar Vacuna</button>
        </fieldset>

        <button class="form__button-submit" type="submit">Guardar Historia</button>
    </form>
</x-card>
@endsection

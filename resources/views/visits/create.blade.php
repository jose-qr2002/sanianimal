@extends('layout.admin')


@section('contenido')
<x-card title="Registrar Visita" class="mt-8 mb-8 max-w-screen-lg m-auto">
    <form class="form" id="history-form" action="{{ route('visits.store') }}" method="POST" novalidate>
        @csrf
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del Dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="customer">Nombres:</label>
                    <input class="form__input" type="text" id="customer"value="{{ $history->pet->customer->name . ' ' . $history->pet->customer->lastname }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="document">Celular:</label>
                    <input class="form__input" type="text" id="document" value="{{ $history->pet->customer->phone }}" disabled>
                </div>
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información de la Mascota</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="pet">Mascota:</label>
                    <input class="form__input" type="text" id="pet" disabled value="{{ $history->pet->name }}">
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
            <input type="hidden" name="clinical_history_id" value="{{ old('clinical_history_id', $history->id) }}">
            <div class="form__group-3">
                <div class="form__input-group">
                    <label class="form__label" for="heart_rate">Frecuencia Cardiaca</label>
                    <input class="form__input @error('heart_rate') form__input-error @enderror" type="number" id="heart_rate" name="heart_rate" value="{{ old('heart_rate') }}" required min="1">
                    @error('heart_rate')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="respiratory_rate">Frecuencia Respiratoria</label>
                    <input class="form__input @error('respiratory_rate') form__input-error @enderror" type="number" id="respiratory_rate" name="respiratory_rate" value="{{ old('respiratory_rate') }}" required min="1">
                    @error('respiratory_rate')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="temperature">Temperatura (C°):</label>
                    <input class="form__input @error('temperature') form__input-error @enderror" type="number" id="temperature" name="temperature" value="{{ old('temperature') }}" required>
                    @error('temperature')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form__group-3">
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
                <div class="form__input-group">
                    <label class="form__label" for="time">Hora:</label>
                    <input class="form__input @error('time') form__input-error @enderror" type="time" id="time" name="time" value="{{ old('time') }}" required>
                    @error('time')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                <label class="form__label" for="symptoms">Sintomas:</label>
                <textarea class="form__input @error('symptoms') form__input-error @enderror" id="symptoms" name="symptoms">{{old('symptoms')}}</textarea>
                @error('symptoms')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="exams">Examenes:</label>
                <textarea class="form__input @error('exams') form__input-error @enderror" id="exams" name="exams">{{old('exams')}}</textarea>
                @error('exams')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="exam_results">Resultados de Exámenes:</label>
                <textarea class="form__input @error('exam_results') form__input-error @enderror" id="exam_results" name="exam_results">{{old('exam_results')}}</textarea>
                @error('exam_results')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="differential_diagnosis">Diagnostico Diferencial:</label>
                <textarea class="form__input @error('differential_diagnosis') form__input-error @enderror" id="differential_diagnosis" name="differential_diagnosis">{{old('differential_diagnosis')}}</textarea>
                @error('differential_diagnosis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="definitive_diagnosis">Diagnostico Definitivo:</label>
                <textarea class="form__input @error('definitive_diagnosis') form__input-error @enderror" id="definitive_diagnosis" name="definitive_diagnosis">{{old('definitive_diagnosis')}}</textarea>
                @error('definitive_diagnosis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="treatment">Tratamiento:</label>
                <textarea class="form__input @error('treatment') form__input-error @enderror" id="treatment" name="treatment">{{old('treatment')}}</textarea>
                @error('treatment')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="recommendations">Recomendaciones:</label>
                <textarea class="form__input @error('recommendations') form__input-error @enderror" id="recommendations" name="recommendations">{{old('recommendations')}}</textarea>
                @error('recommendations')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="recipes">Recetas:</label>
                <textarea class="form__input @error('recipes') form__input-error @enderror" id="recipes" name="recipes">{{old('recipes')}}</textarea>
                @error('recipes')
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

@extends('layout.admin')

@section('contenido')
<x-card title="Editar Visita" class="mt-8 mb-8 max-w-screen-lg m-auto">
    <form class="form" id="history-form" action="" method="POST" novalidate>
        @csrf
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del Dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="customer">Nombres:</label>
                    <input class="form__input" type="text" id="customer"value="{{ $visit->history->pet->customer->name . ' ' . $visit->history->pet->customer->lastname }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="document">Celular:</label>
                    <input class="form__input" type="text" id="document" value="{{ $visit->history->pet->customer->phone }}" disabled>
                </div>
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información de la Mascota</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="pet">Mascota:</label>
                    <input class="form__input" type="text" id="pet" disabled value="{{$visit->history->pet->name }}">
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="weight">Peso(kg):</label>
                    <input class="form__input @error('weight') form__input-error @enderror" type="text" id="weight" name="weight" value="{{ old('weight', $visit->weight) }}" required>
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
            <input type="hidden" name="clinical_history_id" value="{{ $visit->history->id }}">
            <div class="form__group-3">
                <div class="form__input-group">
                    <label class="form__label" for="heart_rate">Frecuencia Cardiaca</label>
                    <input class="form__input @error('heart_rate') form__input-error @enderror" type="number" id="heart_rate" name="heart_rate" value="{{ old('heart_rate', $visit->heart_rate) }}" required min="1">
                    @error('heart_rate')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="respiratory_rate">Frecuencia Respiratoria</label>
                    <input class="form__input @error('respiratory_rate') form__input-error @enderror" type="number" id="respiratory_rate" name="respiratory_rate" value="{{ old('respiratory_rate', $visit->respiratory_rate) }}" required min="1">
                    @error('respiratory_rate')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="temperature">Temperatura (C°):</label>
                    <input class="form__input @error('temperature') form__input-error @enderror" type="number" id="temperature" name="temperature" value="{{ old('temperature', $visit->temperature) }}" required>
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
                    <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" name="price" value="{{ old('price', $visit->price) }}" required>
                    @error('price')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="date">Fecha:</label>
                    <input class="form__input @error('date') form__input-error @enderror" type="date" id="date" name="date" value="{{ old('date', $visit->date->toDateString()) }}" required>
                    @error('date')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="time">Hora:</label>
                    <input class="form__input @error('time') form__input-error @enderror" type="time" id="time" name="time" value="{{ old('time', $visit->time) }}" required>
                    @error('time')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="anamnesis">Anamnesis</label>
                <textarea class="form__input @error('anamnesis') form__input-error @enderror" type="text" id="anamnesis" name="anamnesis">{{old('anamnesis', $visit->anamnesis)}}</textarea>
                @error('anamnesis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="symptoms">Sintomas:</label>
                <textarea class="form__input @error('symptoms') form__input-error @enderror" id="symptoms" name="symptoms">{{old('symptoms', $visit->symptoms)}}</textarea>
                @error('symptoms')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="exams">Examenes:</label>
                <textarea class="form__input @error('exams') form__input-error @enderror" id="exams" name="exams">{{old('exams', $visit->exams)}}</textarea>
                @error('exams')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="exam_results">Resultados de Exámenes:</label>
                <textarea class="form__input @error('exam_results') form__input-error @enderror" id="exam_results" name="exam_results">{{old('exam_results', $visit->exam_results)}}</textarea>
                @error('exam_results')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="differential_diagnosis">Diagnostico Diferencial:</label>
                <textarea class="form__input @error('differential_diagnosis') form__input-error @enderror" id="differential_diagnosis" name="differential_diagnosis">{{old('differential_diagnosis', $visit->differential_diagnosis)}}</textarea>
                @error('differential_diagnosis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="definitive_diagnosis">Diagnostico Definitivo:</label>
                <textarea class="form__input @error('definitive_diagnosis') form__input-error @enderror" id="definitive_diagnosis" name="definitive_diagnosis">{{old('definitive_diagnosis', $visit->definitive_diagnosis)}}</textarea>
                @error('definitive_diagnosis')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="treatment">Tratamiento:</label>
                <textarea class="form__input @error('treatment') form__input-error @enderror" id="treatment" name="treatment">{{old('treatment', $visit->treatment)}}</textarea>
                @error('treatment')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="recommendations">Recomendaciones:</label>
                <textarea class="form__input @error('recommendations') form__input-error @enderror" id="recommendations" name="recommendations">{{old('recommendations', $visit->recommendations)}}</textarea>
                @error('recommendations')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="recipes">Recetas:</label>
                <textarea class="form__input @error('recipes') form__input-error @enderror" id="recipes" name="recipes">{{old('recipes', $visit->recipes)}}</textarea>
                @error('recipes')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </fieldset>
        
        <fieldset class="form__fieldset">
            <legend class="form__legend">Vacunas</legend>
            <ul class="form__ul form__ul--vaccines" id="section">
                @foreach ($visit->vaccines as $vaccine)
                    <li class="form__li">
                        <p class="form__li__p--primary">{{ $vaccine->vaccine }}</p>
                        <p class="form__li__p--secondary">{{ $vaccine->pivot->observation }}</p>
                        <a href="{{ route('visits.edit.vaccine', [$visit, $vaccine->pivot->id]) }}" class="form__button--edit" id="button-vaccine">Modificar Vacuna</a>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('visits.create.vaccine', $visit) }}" type="button" class="form__button--add" id="button-vaccine">Agregar Vacuna</a>

            
        </fieldset>

        <button class="form__button-submit" type="submit">Guardar Visita</button>
    </form>
</x-card>
@endsection

@extends('layout.admin')


@section('contenido')
<x-card title="Registrar Historia" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" id="history-form" action="{{ route('historias.store') }}" method="POST" novalidate>
        @csrf
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información del Dueño</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="cliente">Nombres:</label>
                    <input class="form__input" type="text" id="cliente"value="{{ $cliente->nombre . ' ' . $cliente->apellido }}" disabled>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="documento">Documento:</label>
                    <input class="form__input" type="text" id="documento" value="{{ $cliente->n_documento }}" disabled>
                </div>
            </div>
        </fieldset>
        <fieldset class="form__fieldset">
            <legend class="form__legend">Información de la Mascota</legend>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="mascota_id">Mascota:</label>
                    <select class="form__input @error('mascota_id') form__input-error @enderror" name="mascota_id" id="">
                        @foreach ($cliente->mascotas as $mascota)
                            <option disabled selected>-- Seleccione una mascota --</option>
                            <option value="{{ $mascota->id }}" {{ old('mascota_id') == $mascota->id ? 'selected' : '' }} >{{ $mascota->nombre }}</option>
                        @endforeach
                    </select>
                    @error('mascota_id')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="peso">Peso(kg):</label>
                    <input class="form__input @error('peso') form__input-error @enderror" type="text" id="peso" name="peso" value="{{ old('peso') }}" required>
                    @error('peso')
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
                    <label class="form__label" for="numero">Número:</label>
                    <input class="form__input @error('numero') form__input-error @enderror" type="text" id="numero" name="numero" value="{{ old('numero',$ultimoNumero) }}" required>
                    @error('numero')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="precio">Precio:</label>
                    <input class="form__input @error('precio') form__input-error @enderror" type="text" id="precio" name="precio" value="{{ old('precio') }}" required>
                    @error('precio')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="fecha">Fecha:</label>
                    <input class="form__input @error('fecha') form__input-error @enderror" type="date" id="fecha" name="fecha" value="{{ old('fecha') }}" required>
                    @error('fecha')
                        <div class="form__error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="motivo">Motivo</label>
                <textarea class="form__input @error('motivo') form__input-error @enderror" type="text" id="motivo" name="motivo">{{old('motivo')}}</textarea>
                @error('motivo')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="mucosas">Mucosas</label>
                <textarea class="form__input @error('mucosas') form__input-error @enderror" type="text" id="mucosas" name="mucosas">{{old('mucosas')}}</textarea>
                @error('mucosas')
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
                <label class="form__label" for="diagnostico">Diagnostico</label>
                <textarea class="form__input @error('diagnostico') form__input-error @enderror" type="text" id="diagnostico" name="diagnostico">{{old('diagnostico')}}</textarea>
                @error('diagnostico')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="tratamiento">Tratamiento</label>
                <textarea class="form__input @error('tratamiento') form__input-error @enderror" type="text" id="tratamiento" name="tratamiento">{{old('tratamiento')}}</textarea>
                @error('tratamiento')
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
                    $errorsArray = $errors->getMessages();

                    $errorsVaccines = [];

                    // Filtra los errores relacionados con 'vaccines'
                    $vaccinesErrors = [];
                    foreach ($errorsArray as $key => $messages) {
                        if (strpos($key, 'vaccines.') === 0) {
                            $vaccinesErrors[$key] = $messages;
                        }
                    }

                    // Convierte los errores a formato JSON
                    $vaccinesErrorsJson = json_encode($vaccinesErrors);
                @endphp
            @endif
            <input type="hidden" name="errors_json" id="errors_json" value="{{ isset($vaccinesErrorsJson) ? $vaccinesErrorsJson : ''}}">
            <ul id="vaccine-section">

            </ul>

            <button type="button" class="form__button" id="button-vaccine">Agregar Vacuna</button>
        </fieldset>

        <button class="form__button-submit" type="submit">Guardar Historia</button>
    </form>
</x-card>
@endsection

<form class="form" id="history-form" @submit.prevent="submit" novalidate
    x-data="historyForm()" x-init="getVaccinesDB()">
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
                <input class="form__input @error('weight') form__input-error @enderror" type="text" id="weight" wire:model='weight' required>
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
                <input class="form__input @error('heart_rate') form__input-error @enderror" type="number" id="heart_rate" wire:model='heart_rate' required min="1">
                @error('heart_rate')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="respiratory_rate">Frecuencia Respiratoria</label>
                <input class="form__input @error('respiratory_rate') form__input-error @enderror" type="number" id="respiratory_rate" wire:model='respiratory_rate' required min="1">
                @error('respiratory_rate')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="temperature">Temperatura (C°):</label>
                <input class="form__input @error('temperature') form__input-error @enderror" type="number" id="temperature" wire:model='temperature' required>
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
                <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" wire:model='price' required>
                @error('price')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="date">Fecha:</label>
                <input class="form__input @error('date') form__input-error @enderror" type="date" id="date" wire:model='date' required>
                @error('date')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="time">Hora:</label>
                <input class="form__input @error('time') form__input-error @enderror" type="time" id="time" wire:model='time' required>
                @error('time')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__input-group">
            <label class="form__label" for="anamnesis">Anamnesis</label>
            <textarea class="form__input @error('anamnesis') form__input-error @enderror" type="text" id="anamnesis" wire:model='anamnesis'></textarea>
            @error('anamnesis')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="symptoms">Sintomas:</label>
            <textarea class="form__input @error('symptoms') form__input-error @enderror" id="symptoms" wire:model='symptoms'></textarea>
            @error('symptoms')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="exams">Examenes:</label>
            <textarea class="form__input @error('exams') form__input-error @enderror" id="exams" wire:model='exams'></textarea>
            @error('exams')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="exam_results">Resultados de Exámenes:</label>
            <textarea class="form__input @error('exam_results') form__input-error @enderror" id="exam_results" wire:model='exam_results'></textarea>
            @error('exam_results')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="differential_diagnosis">Diagnostico Diferencial:</label>
            <textarea class="form__input @error('differential_diagnosis') form__input-error @enderror" id="differential_diagnosis" wire:model='differential_diagnosis'></textarea>
            @error('differential_diagnosis')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="definitive_diagnosis">Diagnostico Definitivo:</label>
            <textarea class="form__input @error('definitive_diagnosis') form__input-error @enderror" id="definitive_diagnosis" wire:model='definitive_diagnosis'></textarea>
            @error('definitive_diagnosis')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="treatment">Tratamiento:</label>
            <textarea class="form__input @error('treatment') form__input-error @enderror" id="treatment" wire:model='treatment'></textarea>
            @error('treatment')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="recommendations">Recomendaciones:</label>
            <textarea class="form__input @error('recommendations') form__input-error @enderror" id="recommendations" wire:model='recommendations'></textarea>
            @error('recommendations')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="recipes">Recetas:</label>
            <textarea class="form__input @error('recipes') form__input-error @enderror" id="recipes" wire:model='recipes'></textarea>
            @error('recipes')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </fieldset>

    <!-- Campo oculto para enviar las vacunas como JSON -->
    {{-- <input type="hidden" name="vaccines_errors" id="vaccines_errors" value="{{ isset($vaccinesErrorsJson) ? $vaccinesErrorsJson : ''}}"> --}}
    
    <fieldset class="form__fieldset">
        <legend class="form__legend">Vacunas</legend>
        <ul>
            <template x-for="(vaccine, index) in vaccines" :key="index">
                <li class="vaccine">
                    <div class="form__input-group">
                        <label class="form__label" x-text="'Vacuna N°' + (index + 1)"></label>
                        <select class="form__input" x-model="vaccine.vaccine_id">
                            <option value="">-- SELECCIONE UNA VACUNA --</option>
                            <template x-for="(vaccineDB, index) in vaccinesDB" :key="index">
                                <option :value="vaccineDB.id" x-text="vaccineDB.vaccine"></option>
                            </template>
                        </select>
                    </div>
                    <div class="form__input-group">
                        <label class="form__label">Observación:</label>
                        <textarea class="form__input" x-model="vaccine.observation"></textarea>
                    </div>
                    <button type="button" class="form__button--red" @click="removeVaccine">Remover</button>
                </li>
            </template>
        </ul>

        <button type="button" class="form__button" @click="addVaccine">Agregar Vacuna</button>
        @if ($vaccines)
            @php
                // LOL SI FUNCIONO
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
            <div class="form__errors mb-2">    
                @foreach ($vaccinesErrors as $vaccineError)
                    @foreach ($vaccineError as $vaccineErrorMessage)
                        <p class="form__error">{{ $vaccineErrorMessage }}</p>
                    @endforeach
                @endforeach
            </div>
        @endif
    </fieldset>
    <button class="form__button-submit" type="submit">Guardar Historia</button>

</form>

<script>
    function historyForm() {
        return {
            // DATA
            // { vaccine_id: '', observation: '' }
            vaccinesDB: [],
            vaccines: [
                
            ],
            // FUNCIONES
            addVaccine() {
                this.vaccines.push({ vaccine_id: '', observation: '' });
            },
            removeVaccine(index) {
                this.vaccines.splice(index, 1);
            },
            async getVaccinesDB() {
                const apiUrl = `/api/vaccines`;
                const vaccinesAPI = await fetch(apiUrl);
                const data = await vaccinesAPI.json();
                this.vaccinesDB = data;
            },
            async submit() {
                @this.call('store', this.vaccines);
            }
        }
    }
</script>
<form class="form" wire:submit.prevent='update' novalidate>
    <div class="form__input-group">
        <label class="form__label" for="vaccine_id">Vacuna:</label>
        <select class="form__input" id="vaccine_id" wire:model='vaccine_id'>
            @foreach ($vaccines as $vaccine)
                <option value="{{ $vaccine->id }}" >{{ $vaccine->vaccine }}</option>
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
        <textarea class="form__input @error('observation') form__input-error @enderror" id="observation" wire:model='observation'></textarea>
        @error('observation')
            <div class="form__error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button class="form__button-submit">Actualizar Vacuna Aplicada</button>
</form>
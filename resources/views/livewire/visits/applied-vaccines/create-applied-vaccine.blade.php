<form class="form" wire:submit.prevent='store' novalidate>
    <div class="form__input-group">
        <label class="form__label" for="vaccine_id">Vacuna:</label>
        <select class="form__input @error('vaccine_id') form__input-error @enderror" wire:model='vaccine_id' id="vaccine_id">
            <option value="" disabled selected>-- Seleccione una vacuna --</option>
            @foreach ($vaccines as $vaccine)
                <option value="{{ $vaccine->id }}">{{ $vaccine->vaccine }}</option>
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
        <textarea class="form__input @error('observation') form__input-error @enderror" id="observation" wire:model='observation' ></textarea>
        @error('observation')
            <div class="form__error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button class="form__button-submit">Registrar Vacuna Aplicada</button>
</form>

<form class="form" wire:submit.prevent="update" novalidate>
    <fieldset class="form__fieldset">
        <legend class="form__legend">Historia Clinica</legend>
        <div class="form__input-group">
            <label class="form__label" for="number">Número:</label>
            <input class="form__input" type="text" id="number" name="number" wire:model="number">
            @error('number')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </fieldset>
    <fieldset class="form__fieldset">
        <legend class="form__legend">Información de la mascota</legend>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="pet">Nombre:</label>
                <input class="form__input" type="text" id="pet" value="{{ $pet->name }}" disabled>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="specie">Especie:</label>
                <input class="form__input" type="text" id="specie" value="{{ $pet->specie->specie }}" disabled>
            </div>
        </div>
    </fieldset>
    <fieldset class="form__fieldset">
        <legend class="form__legend">Información del dueño</legend>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="customer">Nombres:</label>
                <input class="form__input" type="text" id="customer" value="{{ $pet->customer->name }}" disabled>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="phone">Celular:</label>
                <input class="form__input" type="text" id="phone" value="{{ $pet->customer->phone }}" disabled>
            </div>
        </div>
    </fieldset>
    <button class="form__button-submit" type="submit">Guardar Cambios</button>
</form>

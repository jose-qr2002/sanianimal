<form class="form" wire:submit.prevent='createHistory' novalidate>
    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="number">Número:</label>
            <input class="form__input @error('number') form__input-error @enderror" type="text" id="number" wire:model="number">
            @error('number') <div class="form__error">{{ $message }}</div> @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="pet_id">ID de Mascota:</label>
            <input class="form__input @error('pet_id') form__input-error @enderror" type="text" id="pet_id" wire:model="pet_id">
            @error('pet_id') <div class="form__error">{{ $message }}</div> @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="user_id">ID de Usuario:</label>
            <input class="form__input @error('user_id') form__input-error @enderror" type="text" id="user_id" wire:model="user_id">
            @error('user_id') <div class="form__error">{{ $message }}</div> @enderror
        </div>
    </div>
    <button class="form__button-submit" type="submit">Registrar Historia Clínica</button>
</form>


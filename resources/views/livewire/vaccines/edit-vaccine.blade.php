<form class="form" wire:submit.prevent='update' novalidate>
    <div class="form__group">

        <div class="form__input-group">
                <label class="form__label" for="vaccine">Vacuna:</label>
                <input class="form__input @error('vaccine') form__input-error @enderror" type="text" id="vaccine" name="vaccine" wire:model="vaccine" required>
                @error('vaccine')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="stock">Stock:</label>
                <input class="form__input @error('stock') form__input-error @enderror" type="text" id="stock" name="stock" wire:model="stock" required>
                @error('stock')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div>
            <div class="form__input-group">
                <label class="form__label" for="detail">Detalles:</label>
                <textarea wire:model="detail" class="form__input @error('detail') form__input-error @enderror" id="detail" name="detail">
                </textarea>
                @error('detail')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

    <button class="form__button-submit" type="submit">Guardar Cambios</button>
</form>

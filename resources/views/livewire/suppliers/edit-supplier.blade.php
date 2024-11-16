<form class="form" wire:submit.prevent='update' novalidate>
    <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="ruc">RUC:</label>
                <input class="form__input @error('ruc') form__input-error @enderror" type="text" id="ruc" name="ruc" wire:model="ruc" required>
                @error('ruc')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" wire:model="name" required>
                @error('name')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
    </div>

    <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="phone">Teléfono:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="phone" name="phone" wire:model="phone" required>
                @error('phone')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="address">Dirección:</label>
                <input class="form__input @error('address') form__input-error @enderror" type="text" id="address" name="address" wire:model="address" required>
                @error('address')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
    </div>

    <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="email">Correo:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="email" name="email" wire:model="email" required>
                @error('email')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="occupation">Ocupación:</label>
                <input class="form__input @error('occupation') form__input-error @enderror" type="text" id="occupation" name="occupation" wire:model="occupation" required>
                @error('occupation')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>

    <button class="form__button-submit" type="submit">Actualizar Proveedor</button>
</form>

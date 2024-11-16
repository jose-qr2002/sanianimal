<form class="form" wire:submit.prevent='createSupplier' novalidate>
    <div class="form__group">
        <div class="form__input-group">
                <label class="form__label" for="ruc">Ruc:</label>
                <input class="form__input @error('ruc') form__input-error @enderror" type="text" id="ruc" name="ruc" wire:model="ruc" autocomplete="off">
                @error('ruc')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
        </div>

        <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" wire:model="name" autocomplete="off">
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    </div>
    <div class="form__group">
        <div class="form__input-group">
                <label class="form__label" for="phone">Telefono:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="phone" name="phone" wire:model="phone" autocomplete="off">
                @error('phone')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="address">Direccion:</label>
                <input class="form__input @error('address') form__input-error @enderror" type="text" id="address" name="address" wire:model="address" autocomplete="off">
                @error('address')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="email">Correo:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="email" name="email" wire:model="email" autocomplete="off" >
                @error('email')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="occupation">Ocupación:</label>
                <input class="form__input @error('occupation') form__input-error @enderror" type="text" id="occupation" name="occupation" wire:model="occupation" autocomplete="off" >
                @error('occupation')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>
    <button class="form__button-submit" type="submit">Registrar Proveedor</button>
</form>


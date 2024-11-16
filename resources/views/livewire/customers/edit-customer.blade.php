<form class="form" wire:submit.prevent='update' novalidate>
    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="name">Nombre:</label>
            <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" wire:model="name" required>
            @error('name')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="lastname">Apellido:</label>
            <input class="form__input @error('lastname') form__input-error @enderror" type="text" id="lastname" wire:model="lastname" required>
            @error('lastname')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form__group-3">
        <div class="form__input-group">
            <label class="form__label" for="n_document">Número de documento:</label>
            <input class="form__input @error('n_document') form__input-error @enderror" type="text" id="n_document" wire:model="n_document" required>
            @error('n_document')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="phone">Celular:</label>
            <input class="form__input @error('phone') form__input-error @enderror" type="text" id="phone" wire:model="phone" required>
            @error('phone')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="sex">Sexo:</label>
            <select class="form__input @error('sex') form__input-error @enderror" id="sex" wire:model="sex" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            @error('sex')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="email">Correo electrónico:</label>
            <input class="form__input @error('email') form__input-error @enderror" type="email" id="email" wire:model="email">
            @error('email')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="birthdate">Fecha de nacimiento:</label>
            <input class="form__input @error('birthdate') form__input-error @enderror" type="date" id="birthdate" wire:model="birthdate">
            @error('birthdate')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form__input-group">
        <label class="form__label" for="address">Dirección:</label>
        <input class="form__input @error('address') form__input-error @enderror" type="text" id="address" wire:model="address">
        @error('address')
            <div class="form__error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button class="form__button-submit" type="submit">Guardar Cambios</button>
</form>
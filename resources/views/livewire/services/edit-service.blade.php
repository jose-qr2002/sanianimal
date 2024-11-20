<form class="form" wire:submit.prevent='update' novalidate>
    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="name">Nombre del Servicio:</label>
            <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" wire:model="name" required>
            @error('name')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="price">Precio:</label>
            <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" wire:model="price" required>
            @error('price')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form__input-group">
        <label class="form__label" for="description">Descripción:</label>
        <input class="form__input @error('description') form__input-error @enderror" type="text" id="description" wire:model="description">
        @error('description')
            <div class="form__error">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button class="form__button-submit" type="submit">Guardar Cambios</button>
</form>
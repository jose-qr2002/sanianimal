<form class="form" wire:submit.prevent='createService' novalidate>
    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="name">Nombre del servicio:</label>
            <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" wire:model="name" autocomplete="off">
            @error('name')
                <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="lastname">Precio:</label>
            <input class="form__input @error('precio') form__input-error @enderror" type="text" id="precio" wire:model="precio" autocomplete="off">
            @error('precio')
                <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form__input-group">
            <label class="form__label" for="description">Descripción:</label>
            <input class="form__input @error('description') form__input-error @enderror" type="text" id="description" wire:model="description" autocomplete="off">
            @error('description')
                <div class="form__error"> {{ $message }} </div>
            @enderror
    </div>

    <button class="form__button-submit" type="submit">Registrar Servicio</button>

</form>

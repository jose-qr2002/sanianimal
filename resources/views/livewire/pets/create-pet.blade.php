<form class="form" wire:submit.prevent='createPet' novalidate>
    <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" wire:model="name" required>
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group" id="fieldCustomer">
                <label class="form__label" for="n_document">Cliente (DNI):</label>
                <div class="form__relative">
                <input 
                type="number" 
                id="n_document" 
                class="form__input @error('n_document') form__input-error @enderror"
                wire:model="n_document"
                min="0" 
            >
            @if($errorMessage)
                <span class="form__error">{{ $errorMessage }}</span>
            @endif
            @if($customer_name && $customer_lastname)
                    <div class="form__info">
                        <p> {{ $customer_name }} {{ $customer_lastname }}</p>
                    </div>
                @endif
            
        </div>

        </div>
    </div>
    <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="sex">Sexo:</label>
                <select class="form__input @error('sex') form__input-error @enderror" id="sex" name="sex" required wire:model="sex">
                <option value="" disabled>-- Seleccione una opción --</option>     
                <option value="Macho" >Macho</option>
                    <option value="Hembra" >Hembra</option>
                    <option value="Indefinido">Indefinido</option>
                </select>
                @error('sex')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="color">Color:</label>
                <input class="form__input @error('color') form__input-error @enderror" type="text" id="color" name="color" wire:model="color">
            </div>
            @error('color')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="specie_id">Especie</label>
                <select class="form__input @error('specie_id') form__input-error @enderror" id="specie_id" name="specie_id" wire:model="specie_id" required>
                    <option value="" disabled selected>-- Seleccione una especie --</option>
                    @foreach ($species as $specie)
                        <option value="{{ $specie->id }}" >{{ $specie->specie }}</option>
                    @endforeach
                </select>
                @error('specie_id')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="race">Raza:</label>
                <input class="form__input @error('race') form__input-error @enderror" type="text" id="race" name="race" wire:model="race">
                @error('race')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="pedigree">Pedigree:</label>
                <select class="form__input @error('pedigree') form__input-error @enderror" id="pedigree" name="pedigree" wire:model="pedigree" required>
                <option value="" disabled>-- Seleccione una opción --</option>   
                <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                @error('pedigree')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="birthdate">Fecha de Nacimiento:</label>
                <input class="form__input @error('birthdate') form__input-error @enderror" type="date" id="birthdate" name="birthdate" wire:model="birthdate">
                @error('birthdate')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__input-group">
            <label class="form__label" for="image">Imagen</label>
            <label class="form__file" for="image">Subir Imagen</label>
            <input class="form__input" type="file" id="image" name="image" accept="image/*" wire:model="image"  >
            @error('image')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if ($image)
            <div class="form__img-preview mb-5">
                <img src="{{ $image->temporaryUrl() }}" alt="Vista previa de la imagen" style="max-width: 200px;">
            </div>
        @endif

    <button class="form__button-submit" type="submit">Registrar Vacuna</button>
    
    </form>

    
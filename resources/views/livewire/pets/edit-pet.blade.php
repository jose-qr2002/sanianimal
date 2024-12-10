<form class="form" wire:submit.prevent="updatePet" novalidate>
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
    <label class="form__label" for="customer">Cliente (DNI):</label>
    <input class="form__input @error('customer_id') form__input-error @enderror" 
           type="text" 
           id="customer" 
           wire:model="customerSearch" 
           value="{{ $customerSearch }}">
           <input type="hidden" wire:model="customer_id">
    @error('customer_id')
        <div class="form__error">{{ $message }}</div>
    @enderror
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
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="sex">Sexo:</label>
                <select class="form__input @error('sex') form__input-error @enderror" id="sex" name="sex" wire:model="sex" required>
                    <option value="Macho" >Macho</option>
                    <option value="Hembra" >Hembra</option>
                    <option value="Indefinido" >Indefinido</option>
                </select>
                @error('sex')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form__input-group">
                <label class="form__label" for="color">Color:</label>
                <input class="form__input @error('color') form__input-error @enderror" type="text" name="color" id="color" wire:model="color">
                @error('color')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="specie_id">Especie</label>
                <select class="form__input @error('specie_id') form__input-error @enderror" id="specie_id" wire:model="specie_id" required>
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
                <input class="form__input @error('race') form__input-error @enderror" type="text" id="race" wire:model="race">
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
                <select class="form__input @error('pedigree') form__input-error @enderror" id="pedigree" wire:model="pedigree" required>
                    <option value="0" >No</option>
                    <option value="1" >Sí</option>
                </select>
                @error('pedigree')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form__input-group">
                <label class="form__label" for="birthdate">Fecha de Nacimiento:</label>
                <input class="form__input @error('birthdate') form__input-error @enderror" type="date" id="birthdate" wire:model="birthdate">
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
            <input class="form__input" type="file" id="image" wire:model="image" accept="image/*">
            @error('image')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form__img-preview mb-5">
        @if ($image)
        <!-- Mostrar la vista previa de la nueva imagen cargada -->
        <img src="{{ $image->temporaryUrl()  }}" alt="Vista previa de la nueva imagen" style="max-width: 200px;">
    @elseif ($pet->image) 
        <!-- Mostrar la imagen guardada de la mascota -->
        <img src="{{ asset('storage/images/pets/' . $pet->image) }}" alt="Vista previa de la imagen guardada" style="max-width: 200px;">
    @else
        <p>No hay imagen disponible para esta mascota.</p>
    @endif
</div>

        <button class="form__button-submit" type="submit">Modificar Mascota</button>
    </form>

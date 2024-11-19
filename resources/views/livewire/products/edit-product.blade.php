<form class="form" wire:submit.prevent="update" novalidate>
    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="code">Código:</label>
            <input class="form__input @error('code') form__input-error @enderror" type="text" id="code" wire:model="code" required>
            @error('code') <div class="form__error">{{ $message }}</div> @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="name">Nombre:</label>
            <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" wire:model="name" required>
            @error('name') <div class="form__error">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="stock">Stock:</label>
            <input class="form__input @error('stock') form__input-error @enderror" type="text" id="stock" wire:model="stock" required>
            @error('stock') <div class="form__error">{{ $message }}</div> @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="price">Precio:</label>
            <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" wire:model="price" required>
            @error('price') <div class="form__error">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="measurement">Medida:</label>
            <select wire:model="measurement" class="form__input @error('measurement') form__input-error @enderror">
                <option value="" disabled>-- Seleccione una opción --</option>
                <option value="units">Unidades</option>
                <option value="kilograms">Kilogramos</option>
                <option value="grams">Gramos</option>
            </select>
            @error('measurement') <div class="form__error">{{ $message }}</div> @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="brand">Marca:</label>
            <input class="form__input @error('brand') form__input-error @enderror" type="text" id="brand" wire:model="brand" required>
            @error('brand') <div class="form__error">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__input-group">
            <label class="form__label" for="category_id">Categoría:</label>
            <select wire:model="category_id" class="form__input @error('category_id') form__input-error @enderror">
                <option value="" disabled>-- Seleccione una opción --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="form__error">{{ $message }}</div> @enderror
        </div>
        <div class="form__input-group">
            <label class="form__label" for="supplier_id">Proveedor:</label>
            <select wire:model="supplier_id" class="form__input @error('supplier_id') form__input-error @enderror">
                <option value="" disabled>-- Seleccione una opción --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id') <div class="form__error">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form__input-group">
        <label class="form__label" for="description">Descripción:</label>
        <textarea wire:model="description" class="form__input @error('description') form__input-error @enderror" id="description"></textarea>
        @error('description') <div class="form__error">{{ $message }}</div> @enderror
    </div>

    <button class="form__button-submit" type="submit">Actualizar Producto</button>
</form>

@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Producto" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('products.store') }}" method="POST" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="code">Código:</label>
                <input class="form__input @error('code') form__input-error @enderror" type="text" id="code" name="code" value="{{ old('code') }}" required>
                @error('code')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="stock">Stock::</label>
                <input class="form__input @error('stock') form__input-error @enderror" type="text" id="stock" name="stock" value="{{ old('stock') }}" required>
                @error('stock')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="price">Precio:</label>
                <input class="form__input @error('price') form__input-error @enderror" type="text" id="price" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="measurement">Medida:</label>
                <select class="form__input @error('measurement') form__input-error @enderror"" name="measurement" id="measurement">
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    <option value="units" {{ old('measurement') == "units" ? 'selected' : ''}}>Unidades</option>
                    <option value="kilograms" {{ old('measurement') == "kilograms" ? 'selected' : ''}}>Kilogramos</option>
                    <option value="grams" {{ old('measurement') == "grams" ? 'selected' : ''}}>Gramos</option>
                </select>
                @error('measurement')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="brand">Marca:</label>
                <input class="form__input @error('brand') form__input-error @enderror" type="text" id="brand" name="brand" value="{{ old('brand') }}" required>
                @error('brand')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="category_id">Categoría:</label>
                <select class="form__input @error('category_id') form__input-error @enderror"" name="category_id" id="category_id">
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="supplier_id">Proveedor:</label>
                <select class="form__input @error('supplier_id') form__input-error @enderror"" name="supplier_id" id="supplier_id">
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    @foreach ($suppliers as $suplier)
                        <option value="{{ $suplier->id }}" {{ old('supplier_id') == $suplier->id ? 'selected' : ''}}>{{ $suplier->name }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div>
            <div class="form__input-group">
                <label class="form__label" for="description">Descripcion:</label>
                <textarea class="form__input @error('description') form__input-error @enderror" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">Registrar Producto</button>
    </form>
</x-card>
@endsection
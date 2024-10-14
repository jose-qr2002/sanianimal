@extends('layout.admin')

@section('contenido')
<x-card title="Editar Proveedor" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('suppliers.update', $supplier) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="ruc">RUC:</label>
                <input class="form__input @error('ruc') form__input-error @enderror" type="text" id="ruc" name="ruc" value="{{ old('ruc', $supplier->ruc) }}" required>
                @error('ruc')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
                @error('name')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="phone">Teléfono:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}" required>
                @error('phone')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="address">Dirección:</label>
                <input class="form__input @error('address') form__input-error @enderror" type="text" id="address" name="address" value="{{ old('address', $supplier->address) }}" required>
                @error('address')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="email">Correo:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="email" name="email" value="{{ old('email', $supplier->email) }}" >
                @error('email')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="occupation">Ocupación:</label>
                <input class="form__input @error('occupation') form__input-error @enderror" type="text" id="occupation" name="occupation" value="{{ old('occupation', $supplier->occupation) }}" >
                @error('occupation')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">Actualizar Proveedor</button>
    </form>
</x-card>
@endsection

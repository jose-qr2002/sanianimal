@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Medicamento" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('suppliers.store') }}" method="POST" novalidate>
        @csrf
        <div class="form__group">
        <div class="form__input-group">
                <label class="form__label" for="ruc">Ruc:</label>
                <input class="form__input @error('ruc') form__input-error @enderror" type="text" id="ruc" name="ruc" value="{{ old('ruc') }}" required>
                @error('ruc')
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
                <label class="form__label" for="phone">Telefono:</label>
                <input class="form__input @error('phone') form__input-error @enderror" type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="address">Direccion:</label>
                <input class="form__input @error('address') form__input-error @enderror" type="text" id="address" name="address" value="{{ old('address') }}" required>
                @error('address')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
       

        <button class="form__button-submit" type="submit">Registrar Proveedor</button>
    </form>
</x-card>
@endsection
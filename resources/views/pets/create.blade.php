@extends('layout.admin')


@section('contenido')
<x-card title="Registrar Mascota" class="mt-8 mb-8 max-w-screen-md m-auto">
    <form class="form" action="{{ route('pets.store') }}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="name">Nombre:</label>
                <input class="form__input @error('name') form__input-error @enderror" type="text" id="name" name="name" value="{{old('name')}}" required>
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group" id="fieldCustomer">
                <label class="form__label" for="customer">Cliente:</label>
                <div class="form__relative">
                    <input class="form__input form__input-search @error('customer_id') form__input-error @enderror" type="search" id="customer" name="customer" required value="{{old('customer')}}">
                    <input type="hidden" name="customer_id" value="{{ old('customer_id') }}">
                    <ul class="form__predictions" id="customerPredictions"></ul>
                </div>
                @error('customer_id')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="sex">Sexo:</label>
                <select class="form__input @error('sex') form__input-error @enderror" id="sex" name="sex" required>
                    <option value="Macho" {{ old('sex') == 'Macho' ? 'selected' : '' }}>Macho</option>
                    <option value="Hembra" {{ old('sex') == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                    <option value="Indefinido" {{ old('sex') == 'Indefinido' ? 'selected' : '' }}>Indefinido</option>
                </select>
                @error('sex')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="color">Color:</label>
                <input class="form__input @error('color') form__input-error @enderror" type="text" id="color" name="color" value="{{ old('color') }}">
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
                <select class="form__input @error('specie_id') form__input-error @enderror" id="specie_id" name="specie_id" required>
                    <option value="" disabled selected>-- Seleccione una especie --</option>
                    @foreach ($species as $specie)
                        <option value="{{ $specie->id }}" {{ old('specie_id') == $specie->id ? 'selected' : ''}} >{{ $specie->specie }}</option>
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
                <input class="form__input @error('race') form__input-error @enderror" type="text" id="race" name="race" value="{{old('race')}}">
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
                <select class="form__input @error('pedigree') form__input-error @enderror" id="pedigree" name="pedigree" required>
                    <option value="0" {{ old('pedigree') == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('pedigree') == '1' ? 'selected' : '' }}>Si</option>
                </select>
                @error('pedigree')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="birthdate">Fecha de Nacimiento:</label>
                <input class="form__input @error('birthdate') form__input-error @enderror" type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
                @error('birthdate')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        <button class="form__button-submit" type="submit">Registrar Macota</button>
    </form>
</x-card>

@endsection

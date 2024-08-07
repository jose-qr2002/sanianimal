@extends('menu')


@section('contenido')
<div class="card mt-8 mb-8 max-w-screen-md m-auto">
    <h2>Registro de Medicamentos:</h2>
    <form class="form" action="{{ route('medicamentos.update', $medicamento) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" value="{{ old('nombre', $medicamento->nombre) }}" required>
                @error('nombre')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="marca">Marca:</label>
                <input class="form__input" type="text" id="marca" name="marca" value="{{ old('marca', $medicamento->marca) }}" required>
                @error('marca')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="stock">Stock:</label>
                <input class="form__input" type="text" id="stock" name="stock" value="{{ old('stock', $medicamento->stock) }}" required>
                @error('stock')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form__input-group">
                <label class="form__label" for="precio">Precio:</label>
                <input class="form__input" type="text" id="precio" name="precio" value="{{ old('precio', $medicamento->precio) }}" required>
                @error('precio')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div>
            <div class="form__input-group">
                <label class="form__label" for="descripcion">Descripcion:</label>
                <textarea class="form__input" id="descripcion" name="descripcion">{{old('descripcion', $medicamento->descripcion)}}</textarea>
                @error('descripcion')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">Registrar Medicamento</button>
    </form>
</div>
@push('scripts')
    @session('msn_error')
        <script>
            let mensaje="{{ $value }}";

            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
@endpush
@endsection

@extends('layout.admin')

@section('contenido')
<x-card title="Atender Cliente" class="mt-8 mb-8 max-w-md m-auto">
    <form action="{{ route('histories.create') }}" method="GET">
        <p class="form__subtitle">Ingrese el DNI para verificar sus datos</p>
        <div class="form__input-group">
            <label for="searchParameter" class="form__label">Parametro:</label>
            <input id="searchParameter" name="searchParameter" type="text" class="form__input">
        </div>

        <button type="submit" class="form__button-submit">Buscar</button>
    </form>

    @isset($pet)
        @if (!$pet)
            <div class="atencion__alerta">
                <p>No existe la mascota</p>
                <a href=" {{ route('mascotas.create') }} " target="_blank">Registrar Mascota</a>
            </div>
        @else
            <div class="atencion mt-5">
                <h2 class="atencion__titulo">Mascota</h2>
                <p class="atencion__subtitulo">Datos de la Mascota</p>
                <div class="atencion__detalles">
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Documento:</p>
                        <p class="atencion__dato">{{ $pet->customer->n_document }}</p>
                    </div>
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Nombre:</p>
                        <p class="atencion__dato">{{ $pet->name }}</p>
                    </div>
                    {{--  
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Macotas:</p>

                        @if(!$customer->pets->isEmpty())
                            <div class="atencion__mascotas">
                                @foreach ($customer->pets as $pet)
                                    <a href="" class="atencion__mascota"><i class="ri-arrow-right-fill"></i> {{ $pet->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    --}}
                </div>
                <form action="{{ route('histories.store', $pet->id) }}" method="POST">
                    @csrf
                    <input type="submit" class="atencion__boton" value="Atender">
                </form>
            </div>

        @endif
    @endisset

</x-card>

@endsection

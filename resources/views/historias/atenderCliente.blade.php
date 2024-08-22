@extends('menu')

@section('contenido')
<x-card title="Atender Cliente" class="mt-8 mb-8 max-w-md m-auto">
    <form action="{{ route('historias.atenderCliente') }}" method="GET">
        <p class="form__subtitle">Ingrese el DNI para verificar sus datos</p>
        <div class="form__input-group">
            <label for="n_documento" class="form__label">DNI</label>
            <input id="n_documento" name="n_documento" type="text" class="form__input">
        </div>

        <button type="submit" class="form__button-submit">Buscar</button>
    </form>

    @isset($cliente)
        @if (!$cliente)
            <div class="atencion__alerta">
                <p>No existe el cliente</p>
                <a href=" {{ route('clientes.create') }} " target="_blank">Registrar Cliente</a>
            </div>
        @else
            <div class="atencion mt-5">
                <h2 class="atencion__titulo">Cliente</h2>
                <p class="atencion__subtitulo">Datos del Cliente</p>
                <div class="atencion__detalles">
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Documento:</p>
                        <p class="atencion__dato">{{ $cliente->n_documento }}</p>
                    </div>
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Nombre:</p>
                        <p class="atencion__dato">{{ $cliente->nombre }}</p>
                    </div>
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Apellido:</p>
                        <p class="atencion__dato">{{ $cliente->apellido }}</p>
                    </div>
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Macotas:</p>

                        @if(!$cliente->mascotas->isEmpty())
                            <div class="atencion__mascotas">
                                @foreach ($cliente->mascotas as $mascota)
                                    <a href="" class="atencion__mascota"><i class="ri-arrow-right-fill"></i> {{ $mascota->nombre }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                @if(!$cliente->mascotas->isEmpty())
                    <a href="" class="atencion__boton">Atender</a>
                @else
                    <div class="atencion__alerta">
                        <p>El cliente no tiene mascotas registradas</p>
                        <a href=" {{ route('mascotas.create') }} " target="_blank">Registrar Mascota</a>
                    </div>
                @endif
            </div>

        @endif
    @endisset

</x-card>

@endsection

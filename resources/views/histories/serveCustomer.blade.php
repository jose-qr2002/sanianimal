@extends('layout.admin')

@section('contenido')
<x-card title="Atender Cliente" class="mt-8 mb-8 max-w-md m-auto">
    <form action="{{ route('histories.serveCustomer') }}" method="GET">
        <p class="form__subtitle">Ingrese el DNI para verificar sus datos</p>
        <div class="form__input-group">
            <label for="n_document" class="form__label">DNI</label>
            <input id="n_document" name="n_document" type="text" class="form__input">
        </div>

        <button type="submit" class="form__button-submit">Buscar</button>
    </form>

    @isset($customer)
        @if (!$customer)
            <div class="atencion__alerta">
                <p>No existe el cliente</p>
                <a href=" {{ route('customers.create') }} " target="_blank">Registrar Cliente</a>
            </div>
        @else
            <div class="atencion mt-5">
                <h2 class="atencion__titulo">Cliente</h2>
                <p class="atencion__subtitulo">Datos del Cliente</p>
                <div class="atencion__detalles">
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Documento:</p>
                        <p class="atencion__dato">{{ $customer->n_document }}</p>
                    </div>
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Nombre:</p>
                        <p class="atencion__dato">{{ $customer->name }}</p>
                    </div>
                    <div class="atencion__campo">
                        <p class="atencion__etiqueta">Apellido:</p>
                        <p class="atencion__dato">{{ $customer->lastname }}</p>
                    </div>
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
                </div>
                @if(!$customer->pets->isEmpty())
                    <a href="{{ route('histories.create', $customer->id) }}" class="atencion__boton">Atender</a>
                @else
                    <div class="atencion__alerta">
                        <p>El Cliente no tiene mascotas registradas</p>
                        <a href=" {{ route('pets.create') }} " target="_blank">Registrar Mascota</a>
                    </div>
                @endif
            </div>

        @endif
    @endisset

</x-card>

@endsection

@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Servicio" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:services.create-service />
</x-card>
@endsection

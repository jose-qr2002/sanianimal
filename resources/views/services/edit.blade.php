@extends('layout.admin')

@section('contenido')
<x-card title="Editar Servicio" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:services.edit-service :service=$service />
</x-card>
@endsection

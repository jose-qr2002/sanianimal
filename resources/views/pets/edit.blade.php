@extends('layout.admin')

@section('contenido')
<x-card title="Editar Mascota" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:pets.edit-pet :pet=$pet />
</x-card>
@endsection
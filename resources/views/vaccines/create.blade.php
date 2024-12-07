@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Vacuna" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:vaccines.create-vaccine />
</x-card>
@endsection
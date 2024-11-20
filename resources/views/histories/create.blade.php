@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Historial Clínico" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:histories.create-history />
</x-card>
@endsection

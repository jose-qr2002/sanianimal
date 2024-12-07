@extends('layout.admin')

@section('contenido')
<x-card title="Editar Vacuna" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:vaccines.edit-vaccine :vaccines=$vaccine />
</x-card>
@endsection
@extends('layout.admin')

@section('contenido')
<x-card title="Editar Historial Clínico" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:histories.edit-history :history=$history />
</x-card>
@endsection
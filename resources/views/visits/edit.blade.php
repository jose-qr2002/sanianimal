@extends('layout.admin')

@section('contenido')
<x-card title="Editar Visita" class="mt-8 mb-8 max-w-screen-lg m-auto">
    <livewire:visits.edit-visit  :visit=$visit />
</x-card>
@endsection
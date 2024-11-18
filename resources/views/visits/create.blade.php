@extends('layout.admin')


@section('contenido')
<x-card title="Registrar Visita" class="mt-8 mb-8 max-w-screen-lg m-auto">
    <livewire:visits.create-visit :history=$history>
</x-card>
@endsection

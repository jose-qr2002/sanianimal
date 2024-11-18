@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Vacuna Aplicada" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:visits.applied_vaccines.create-applied-vaccine :visit='$visit'/>
</x-card>
@endsection

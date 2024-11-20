@extends('layout.admin')

@section('contenido')
<x-card title="Editar Vacuna Aplicada" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:visits.applied_vaccines.edit-applied-vaccine :appliedVaccine='$appliedVaccine'/>
</x-card>
<x-card title="" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:visits.applied_vaccines.delete-applied-vaccine :appliedVaccine='$appliedVaccine' :visit='$visit'/>
</x-card>
@endsection

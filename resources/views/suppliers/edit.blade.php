@extends('layout.admin')

@section('contenido')
<x-card title="Editar Proveedores" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:suppliers.edit-supplier :supplier=$supplier />
</x-card>
@endsection
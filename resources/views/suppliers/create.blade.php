@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Proveedor" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:suppliers.create-supplier />
</x-card>
@endsection
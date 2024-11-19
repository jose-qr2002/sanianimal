@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Productos" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:products.create-product />
</x-card>
@endsection
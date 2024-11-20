@extends('layout.admin')

@section('contenido')
<x-card title="Editar Producto" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:products.edit-product :product=$product />
</x-card>
@endsection
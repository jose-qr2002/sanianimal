@extends('layout.admin')

@section('contenido')
<x-card title="Registrar Cliente" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:customers.create-customer />
</x-card>
@endsection

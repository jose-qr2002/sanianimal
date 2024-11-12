@extends('layout.admin')

@section('contenido')
<x-card title="Editar CLiente" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:customers.edit-customer :customer=$customer />
</x-card>
@endsection

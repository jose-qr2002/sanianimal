@extends('layout.admin')
@push('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const preview = document.getElementById('img-preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
@section('contenido')
<x-card title="Registrar Mascota" class="mt-8 mb-8 max-w-screen-md m-auto">
    <livewire:pets.create-pet />
</x-card>
@endsection
@extends('menu')

@section('contenido')
<h2 class="title-menu">Historias Clinicas</h2>
<div class="table-header">
    <button><a href="{{ route('historias.atenderCliente') }}">Atencion</a></button>
    <div class="table-search">
        <input type="search" placeholder="Buscar">
        <i class="ri-search-line" id="search"></i>
    </div>
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Dueño</th>
                <th>Mascota</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($historias as $historia)
                <tr>
                    <td>{{$historia->numero}}</td>
                    <td>{{$historia->mascota->cliente->nombre}}</td>
                    <td>{{$historia->mascota->nombre}}</td>
                    <td>{{$historia->created_at}}</td>
                    <td>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No se encontraron mascotas registradas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="table-footer">
    <p>Total de Filas: 1</p>
</div>

@push('scripts')
    @session('msn_success')
        <script>
            let mensaje="{{ $value }}";
            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
    @session('msn_error')
        <script>
            let mensaje="{{ $value }}";

            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
    <script>
        function confirmaEliminarMascota(event){
            event.preventDefault();
            let form=event.target;

            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar esta mascota?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        }
    </script>
@endpush
@endsection

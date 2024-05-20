@extends('menu')

@section('contenido')
<div class="table-header">
    <h2 class="table-title">Medicamentos</h2>
    <button><a href="{{ route('medicamentos.create') }}">Registrar</a></button>
    <div class="table-search">
        <input type="search" placeholder="Buscar">
        <i class="ri-search-line" id="search"></i>
    </div>
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dueño</th>
                <th>Especie</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rocky</td>
                <td>Alejandro</td>
                <td>Canino</td>
                <td>Marron</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
            <tr>
                <td>Chevas</td>
                <td>Mario</td>
                <td>Canino</td>
                <td>Marron</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
            <tr>
                <td>Jazy</td>
                <td>Alejandro</td>
                <td>Canino</td>
                <td>Negro</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
            <tr>
                <td>Leo</td>
                <td>Rosendo</td>
                <td>Canino</td>
                <td>Blanco</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
            <tr>
                <td>Pereira</td>
                <td>Rene</td>
                <td>Canino</td>
                <td>Blanco</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
            <tr>
                <td>Pelusa</td>
                <td>Alejandro</td>
                <td>Gato</td>
                <td>Negro</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
            <tr>
                <td>Jota</td>
                <td>Elizabeth</td>
                <td>Gato</td>
                <td>Negro</td>
                <td>
                    <i class="ri-file-edit-line" id="icons"></i>
                    <i class="ri-delete-bin-line" id="icons"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-footer">
    <p>Total de Filas: 7</p>
</div>
@endsection
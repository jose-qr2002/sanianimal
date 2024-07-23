@extends('menu')


@section('contenido')
<div class="card mt-8 mb-8 max-w-screen-md m-auto">
    <h2>Registro de Mascotas</h2>
    <form class="form" action="{{ route('mascotas.store') }}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" value="{{old('nombre')}}" required>
            </div>
            <div class="form__input-group" id="campoCliente">
                <label class="form__label" for="cliente">Cliente:</label>
                <div class="form__relative">
                    <input class="form__input form__input-search" type="search" id="cliente" name="cliente" required value="{{old('cliente')}}">
                    <input type="hidden" name="cliente_id" value="{{ old('cliente_id') }}">
                    <ul class="form__predictions" id="clientePredicciones"></ul>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="sexo">Sexo</label>
                <select class="form__input" id="sexo" name="sexo" required>
                    <option value="Macho" {{ old('sexo') == 'Macho' ? 'selected' : '' }}>Macho</option>
                    <option value="Hembra" {{ old('sexo') == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                    <option value="Indefinido" {{ old('sexo') == 'Indefinido' ? 'selected' : '' }}>Indefinido</option>
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="color">Color:</label>
                <input class="form__input" type="text" id="color" name="color" value="{{ old('color') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="especie_id">Especie</label>
                <select class="form__input" id="especie_id" name="especie_id" required>
                    @foreach ($especies as $especie)
                        <option value="{{ $especie->id }}" {{ old('especie_id') == $especie->id ? 'selected' : ''}} >{{ $especie->especie }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="raza">Raza:</label>
                <input class="form__input" type="text" id="raza" name="raza" value="{{old('raza')}}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="pedigree">Pedigree:</label>
                <select class="form__input" id="pedigree" name="pedigree" required>
                    <option value="1" {{ old('pedigree') == '1' ? 'selected' : '' }}>Si</option>
                    <option value="0" {{ old('pedigree') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            </div>
        </div>


        <button class="form__button-submit" type="submit">Registrar Macota</button>
    </form>
</div>

@push('scripts')
    <script>
        const clienteInput = document.querySelector('#cliente');
        const clientePredicciones = document.querySelector('#clientePredicciones');
        const clietenInputId = document.querySelector('[name="cliente_id"]')
        const campoCliente = document.querySelector('#campoCliente');


        clienteInput.addEventListener('input', debounce(manejarClienteInput, 300) )
        clienteInput.addEventListener('blur', manejarClienteBlur)
        clienteInput.addEventListener('focus', manejarClienteFocus)

        let debounceTimeout;

        function debounce(func, delay) {
            return function(...args) {
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        async function manejarClienteInput(e) {
            if (!(e.target.value.length > 2)) {
                clientePredicciones.style.display = 'none';
                return;
            }
            let respuesta = await buscarCliente(e.target.value);
            if(!respuesta) {
                return;
            }

            if(respuesta.type == 'error') {
                mostrarPredicciones(respuesta);
            }

            if(respuesta.type == 'success') {
                mostrarPredicciones(respuesta);
            }
        }

        async function buscarCliente(valor) {
            const apiUrl = `/clientes/search/${valor}`;
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Ocurrio un problema con la operacion fetch:', error);
                return null;
            }
        }

        function mostrarPredicciones(datos) {
            limpiarPredicciones();
            const { type , message , data } = datos;
            clientePredicciones.style.display = 'block';
            if(type == 'error') {
                const prediccionHTML = document.createElement('DIV');
                prediccionHTML.classList.add('form__prediction');
                prediccionHTML.textContent = message;
                clientePredicciones.appendChild(prediccionHTML);
                return;
            }

            if(type == 'success') {

                data.forEach(dato => {
                    let cliente = `${dato.nombre} ${dato.apellido} - ${dato.n_documento}`;

                    const prediccionHTML = document.createElement('LI');
                    prediccionHTML.classList.add('form__prediction');
                    // Llenando de datos al HTML
                    prediccionHTML.textContent = cliente;
                    prediccionHTML.dataset.clienteId = dato.id;
                    prediccionHTML.dataset.clienteNombre = cliente;
                    prediccionHTML.onclick = seleccionarPrediccion;
                    // Añadir al DOM
                    clientePredicciones.appendChild(prediccionHTML);

                });
            }

        }

        function seleccionarPrediccion(e) {
            const idClienteSeleccionado = e.target.dataset.clienteId;
            const nombreClienteSeleccionado = e.target.dataset.clienteNombre;
            clietenInputId.value = idClienteSeleccionado;
            clienteInput.value = nombreClienteSeleccionado;
            limpiarPredicciones();
        }

        function limpiarPredicciones() {
            while(clientePredicciones.firstChild) {
                clientePredicciones.removeChild(clientePredicciones.firstChild);
            }
        }

        // Funciones De Eventos
        function manejarClienteBlur(e) {
            setTimeout(() => { clientePredicciones.style.display = 'none'; }, 120);
        }

        function manejarClienteFocus(e) {
            if(!e.target.id == 'cliente') {
                return;
            }

            if(!(e.target.value.length > 2 )) {
                return;
            }
            clientePredicciones.style.display = 'block';
        }
    </script>
@endpush
@endsection

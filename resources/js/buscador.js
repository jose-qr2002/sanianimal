// Habilitar Buscador
if(document.querySelector('#customer')) {
    const clienteInput = document.querySelector('#customer');
    const clientePredicciones = document.querySelector('#customerPredictions');
    const clietenInputId = document.querySelector('[name="customer_id"]')
    const campoCliente = document.querySelector('#fieldCustomer');


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
        const apiUrl = `/customers/search/${valor}`;
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
                let cliente = `${dato.name} ${dato.lastname} - ${dato.n_document}`;

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
}

// Script usado en vista create de Historias
document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#vaccine-section')) {

        // Lista donde se guardaran todas las vacunas de la base de datos
        let vaccinesDatabase = [];
        // Lista donde se guardaran todas las vacunas seleccionadas
        let vaccines = [];
    
        // VIEW ELEMENTS
        const buttonAddVaccine = document.querySelector('#button-vaccine');
        // Variable que seleccionar elemento html que tiene las vacunas ingresadas anteriormente
        const dataVaccines = document.querySelector('#vaccines');
        // Elemento HTML donde contiene los errores de validacion de las vacunas
        const vaccinesErrorsElement = document.querySelector('#vaccines_errors')
        
        const sectionVaccine = document.querySelector('#vaccine-section');
    
        const formHistory = document.getElementById('history-form');
    
        
    
        /**
         * Eventos de lista
         */
        buttonAddVaccine.addEventListener('click', handleAddVaccine);
    
        formHistory.addEventListener('submit', prepareHistorySubmit);
    
        async function preLoad() {
            vaccinesDatabase = await getVaccines();
            vaccines = dataVaccines.value !== "" ? JSON.parse(dataVaccines.value) : [];
            console.log(dataVaccines);
            
            const vaccinesErrors = vaccinesErrorsElement.value !== "" ? JSON.parse(vaccinesErrorsElement.value) : [];
            
            vaccines = vaccines.map((vaccine, index) => {
                vaccine.errors = vaccinesErrors[index];
                return vaccine;
            })

            console.log(vaccines);

            showVaccines();
        }

        async function handleAddVaccine() {
            const vaccine = {
                vaccine_id: 0,
                observation: '',
            }
    
            if(vaccinesDatabase.length === 0) {
                vaccinesDatabase = await getVaccines();
            }
            vaccines = [...vaccines, vaccine];
    
            showVaccines();
        }
    
        /**
         * This function add vaccines(Elements HTML) on form of clinic histories 
         * @param {*} event Even of JavaScript
         */
        function createVaccineElement(vaccine ,countVaccines) {
            const liElement = document.createElement('LI');
            liElement.id = `vaccine-element-${countVaccines}`;
            liElement.dataset.vaccine = countVaccines;
    
            const buttonRemove = document.createElement('BUTTON');
            buttonRemove.type = 'button';
            buttonRemove.classList.add('form__button--red');
            buttonRemove.textContent = 'Quitar';
            buttonRemove.onclick = removeVaccine;
    
            const inputGroupName = document.createElement('DIV');
            inputGroupName.classList.add('form__input-group');
            
            const inputGroupObservation = inputGroupName.cloneNode(true);
            
            const labelNameVaccine = createLabel('Vacuna: ', `vaccine-${countVaccines}`);
            const inputNameVaccine = createInput('select', `vaccine-${countVaccines}`, vaccinesDatabase, vaccine, countVaccines);
            
            inputGroupName.appendChild(labelNameVaccine);
            inputGroupName.appendChild(inputNameVaccine);
            if(vaccine?.errors?.vaccine_id !== undefined) {
                const errorElementId = createElementError(vaccine.errors.vaccine_id);
                inputGroupName.appendChild(errorElementId)
            }

            const labelObservationVaccine = createLabel('Observación: ', `vaccine-${countVaccines}-observation`)
            const textareaObservationVaccine = createInput('textarea', `vaccine-${countVaccines}-observation`, vaccinesDatabase, vaccine, countVaccines)
            
            inputGroupObservation.appendChild(labelObservationVaccine);
            inputGroupObservation.appendChild(textareaObservationVaccine);

            if(vaccine?.errors?.observation !== undefined) {
                const errorElementObservation = createElementError(vaccine.errors.observation);
                inputGroupObservation.appendChild(errorElementObservation)
            }
    
            liElement.appendChild(inputGroupName);
            liElement.appendChild(inputGroupObservation);
            liElement.appendChild(buttonRemove);
            
            return liElement;
        }
    
        function showVaccines() {
            while(sectionVaccine.firstChild) {
                sectionVaccine.removeChild(sectionVaccine.firstChild)
                
            }
            console.log(vaccines);
            
            vaccines.forEach((vaccine, index) => {
                const vaccineElement = createVaccineElement(vaccine, index + 1);
                sectionVaccine.appendChild(vaccineElement);
                
            });
    
        }
    
        function createLabel(text, attribute) {
            const label = document.createElement('LABEL'); 
            label.textContent = text;
            label.classList.add('form__label');
            label.setAttribute('for', attribute);
            return label;
        }
    
        function createInput(type, attribute, list = [], object = {vaccine_id: '', observation: ''}, order) {
            // Sacando el id actual por si tiene uno
            const currentId = object.vaccine_id ? parseInt(object.vaccine_id) : 0;
            const currentObservation = object.observation ? object.observation : '';
            
            console.log('detalla ' + currentObservation);
            
    
            if(type === 'textarea') {
                const textarea = document.createElement('TEXTAREA');
                textarea.id = attribute;
                textarea.classList.add('form__input');
                textarea.textContent = currentObservation;
                textarea.name = `vaccines[${order-1}][observation]`;
                textarea.addEventListener('input', writeObservation);
                return textarea;
            }
    
            if(type === 'select') {
                const select = document.createElement('SELECT');
                select.id = attribute;
                select.classList.add('form__input');
                select.name = `vaccines[${order-1}][vaccine_id]`;
    
                const option = document.createElement('OPTION');
                option.textContent = 'SELECCIONES UNA VACUNA';
                option.value = ''; // Cuando se envia un string vacio laravel lo toma como null por las validaciones
                option.setAttribute('selected', true)
                select.appendChild(option);
                
                list.forEach(element => {
                    const option = document.createElement('OPTION');
                    option.value = element.id;
                    if(element.id === currentId) {
                        option.setAttribute('selected', true);
                    }
                    option.textContent = element.vaccine;
                    select.appendChild(option);
                });
                select.addEventListener('change', selectVaccine)
                return select;
            }
    
            const inputElement = document.createElement('INPUT')
            inputElement.type = type;
            inputElement.id = attribute;
            inputElement.name = attribute;
            inputElement.classList.add('form__input');
            return inputElement;
        }
    
        function createElementError(message) {
            const errorElement = document.createElement('P');
            errorElement.classList.add('form__error');
            errorElement.textContent = message;
            return errorElement;
        }


        /**
         * Elimnar vacuna del formulario
         */
        function removeVaccine(e) {
            const number = parseInt(e.target.parentElement.dataset.vaccine);
            vaccines = vaccines.filter((vaccine, index) => (index + 1 !== number));
            showVaccines();
        }
    
        async function getVaccines() {
            const apiUrl = `/api/vaccines`;
            const vaccinesAPI = await fetch(apiUrl);
            const data = await vaccinesAPI.json();
            return data;
        }
    
        // Listeners
        function selectVaccine(e) {
            const sectionVaccineParent = e.target.parentElement.parentElement;
            
            const idVaccine = e.target.value;
            const orderNumber = parseInt(sectionVaccineParent.dataset.vaccine);
            
    
            vaccines = vaccines.map((vaccine, index) => { 
                
                if((index + 1) === orderNumber) {
                    
                    vaccine.vaccine_id = idVaccine;
                }
                return vaccine;
            })
            console.log(vaccines);
            
        }
    
        function writeObservation(e) {
            const observation = e.target.value
            const sectionVaccineParent = e.target.parentElement.parentElement;
            const orderNumber = parseInt(sectionVaccineParent.dataset.vaccine);
     
            vaccines = vaccines.map((vaccine, index) => { 
                
                if((index + 1) === orderNumber) {
                    
                    vaccine.observation = observation;
                }
                return vaccine;
            })
            console.log(vaccines);
        }
    
        function prepareHistorySubmit(event) {
            event.preventDefault();
            const form = event.target;
            


            //dataVaccines.value = JSON.stringify(vaccines); ELIMINADO POR ERROR EN VALIDACIONES

            form.submit();
        }
        

        preLoad();
    
    }
})

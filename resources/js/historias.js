// Script usado en vista create de Historias
document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#vaccine-section')) {

        let vaccinesDatabase = [];
    
        let vaccines = [];
    
        /**
         * View Elements
         */
        const buttonAddVaccine = document.querySelector('#button-vaccine');
        const dataVaccines = document.querySelector('#vaccines');
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
            console.log(vaccines);
            showVaccines();
        }

        async function handleAddVaccine() {
            const vaccine = {
                id: 0,
                vaccine: '',
                detail: '',
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
            
            const inputGroupDetail = inputGroupName.cloneNode(true);
            
            const labelNameVaccine = createLabel('Vacuna: ', `vaccine-${countVaccines}`);
            const inputNameVaccine = createInput('select', `vaccine-${countVaccines}`, vaccinesDatabase, vaccine, countVaccines);
            
            inputGroupName.appendChild(labelNameVaccine);
            inputGroupName.appendChild(inputNameVaccine);
            
            const labelDetailVaccine = createLabel('Detalles: ', `vaccine-${countVaccines}-detail`)
            const textareaDetailVaccine = createInput('textarea', `vaccine-${countVaccines}-detail`, vaccinesDatabase, vaccine, countVaccines)
            
            inputGroupDetail.appendChild(labelDetailVaccine);
            inputGroupDetail.appendChild(textareaDetailVaccine);
    
            liElement.appendChild(inputGroupName);
            liElement.appendChild(inputGroupDetail);
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
    
        function createInput(type, attribute, list = [], object = {id: '', detail: ''}, order) {
            // Sacando el id actual por si tiene uno
            const currentId = object.id ? parseInt(object.id) : 0;
            const currentDetail = object.detail ? object.detail : '';
            
            console.log('detalla ' + currentDetail);
            
    
            if(type === 'textarea') {
                const textarea = document.createElement('TEXTAREA');
                textarea.id = attribute;
                textarea.classList.add('form__input');
                textarea.textContent = currentDetail;
                textarea.name = `vaccines[${order-1}][detail]`;
                textarea.addEventListener('input', writeDetail);
                return textarea;
            }
    
            if(type === 'select') {
                const select = document.createElement('SELECT');
                select.id = attribute;
                select.classList.add('form__input');
                select.name = `vaccines[${order-1}][id]`;
    
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
                    
                    vaccine.id = idVaccine;
                }
                return vaccine;
            })
            console.log(vaccines);
            
        }
    
        function writeDetail(e) {
            const detail = e.target.value
            const sectionVaccineParent = e.target.parentElement.parentElement;
            const orderNumber = parseInt(sectionVaccineParent.dataset.vaccine);
     
            vaccines = vaccines.map((vaccine, index) => { 
                
                if((index + 1) === orderNumber) {
                    
                    vaccine.detail = detail;
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

// Script usado en vista create de Historias

if(document.querySelector('#vaccine-section')) {

    let vaccines = [];

    /**
     * View Elements
     */
    const buttonAddVaccine = document.querySelector('#button-vaccine');
    const dataVaccines = document.querySelector('#vaccines');
    const sectionVaccine = document.querySelector('#vaccine-section');

    /**
     * Counters
     */

    //let countVaccines = 1;

    /**
     * Eventos de lista
     */
    buttonAddVaccine.addEventListener('click', handleAddVaccine);

    function handleAddVaccine() {
        const vaccine = {
            name: '',
            detail: '',
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
        const inputNameVaccine = createInput('text', `vaccine-${countVaccines}`);
        
        inputGroupName.appendChild(labelNameVaccine);
        inputGroupName.appendChild(inputNameVaccine);
        
        const labelDetailVaccine = createLabel('Detalles: ', `vaccine-${countVaccines}-detail`)
        const textareaDetailVaccine = createInput('textarea', `vaccine-${countVaccines}-detail`)
        
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

    function createInput(type, attribute) {
        if(type === 'textarea') {
            const textarea = document.createElement('TEXTAREA')
            textarea.id = attribute;
            textarea.classList.add('form__input');
            return textarea;
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

}
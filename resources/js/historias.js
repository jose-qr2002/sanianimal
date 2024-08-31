// Script usado en vista create de Historias

if(document.querySelector('#vaccine-section')) {

    /**
     * Elementos de la vista
     */
    const buttonAddVaccine = document.querySelector('#button-vaccine');
    const dataVaccine = document.querySelector('#vaccines');
    const sectionVaccine = document.querySelector('#vaccine-section');

    /**
     * Contadores
     */

    let countVaccines = 0;

    /**
     * Eventos de lista
     */
    buttonAddVaccine.addEventListener('click', addVaccine);

    /**
     * This function add vaccines on form of clinic histories 
     * @param {*} event Even of JavaScript
     */
    function addVaccine(event) {
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

        sectionVaccine.appendChild(inputGroupName);
        sectionVaccine.appendChild(inputGroupDetail);
        countVaccines++;
        
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
            textarea.name = attribute;
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

}
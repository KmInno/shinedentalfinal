document.addEventListener('DOMContentLoaded', () => {
    let procedureIndex = {{ count($procedures) }};
    const proceduresContainer = document.getElementById('procedures');
    const addProcedureButton = document.getElementById('add-procedure');

    function updateCost(event) {
        const costInput = event.target.parentNode.nextElementSibling.querySelector('input.procedure-cost');
        const selectedOption = event.target.options[event.target.selectedIndex];
        costInput.value = selectedOption.getAttribute('data-cost');
    }

    function addProcedure() {
        const row = document.createElement('div');
        row.className = 'flex items-center procedure-row';
        row.dataset.index = procedureIndex;

        row.innerHTML = `
            <div class="w-1/2 pr-2">
                <label for="procedure_id_${procedureIndex}" class="block text-sm font-medium text-gray-700">Procedure</label>
                <select id="procedure_id_${procedureIndex}" name="procedures[${procedureIndex}][id]" required class="procedure-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Select a procedure</option>
                </select>
            </div>
            <div class="w-1/2 pl-2">
                <label for="procedure_cost_${procedureIndex}" class="block text-sm font-medium text-gray-700">Cost</label>
                <input type="number" name="procedures[${procedureIndex}][procedure_cost]" id="procedure_cost_${procedureIndex}" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
            </div>
            <button type="button" class="remove-procedure ml-2 text-red-500">Remove</button>
        `;

        proceduresContainer.appendChild(row);

        // Add event listener to the new select element
        row.querySelector('.procedure-select').addEventListener('change', updateCost);

        // Add event listener to the new remove button
        row.querySelector('.remove-procedure').addEventListener('click', removeProcedure);

        procedureIndex++;
    }

    function removeProcedure(event) {
        event.target.closest('.procedure-row').remove();
    }

    // Initial setup: add event listener to the add procedure button
    addProcedureButton.addEventListener('click', addProcedure);
});

document.addEventListener('DOMContentLoaded', () => {
    let patientIndex = {{ count($patients) }};
    const patientsContainer = document.getElementById('patients');
    const addPatientButton = document.getElementById('add-patient');

    function updateBalance(event) {
        const balanceInput = event.target.parentNode.nextElementSibling.querySelector(
            'input.patient-balance'
        );
        const selectedOption = event.target.options[event.target.selectedIndex];
        balanceInput.value = selectedOption.getAttribute('data-balance');
    }

    function addPatient() {
        const row = document.createElement('div');
        row.className = 'flex items-center patient-row mb-4';
        row.dataset.index = patientIndex;

        row.innerHTML = `
            <div class="w-1/2 pr-2">
                <label for="patient_id_${patientIndex}" class="block text-sm font-medium text-gray-700">Patient</label>
                <select id="patient_id_${patientIndex}" name="patients[${patientIndex}][id]" required class="patient-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Select a patient</option>
                </select>
            </div>
            <div class="w-1/2 pl-2">
                <label for="patient_balance_${patientIndex}" class="block text-sm font-medium text-gray-700">Balance</label>
                <input type="number" name="patients[${patientIndex}][patient_balance]" id="patient_balance_${patientIndex}" step="0.01" min="0" required class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
            </div>
            <button type="button" class="remove-patient ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
        `;

        patientsContainer.appendChild(row);

        // Add event listener to the new select element
        row.querySelector('.patient-select').addEventListener('change', updateBalance);

        // Add event listener to the new remove button
        row.querySelector('.remove-patient').addEventListener('click', removePatient);

        patientIndex++;
    }

    function removePatient(event) {
        event.target.closest('.patient-row').remove();
    }

    // Initial setup: add event listener to the add patient button
    addPatientButton.addEventListener('click', addPatient);
});

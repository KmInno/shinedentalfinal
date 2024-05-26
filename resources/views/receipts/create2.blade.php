<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Receipt') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('receipts.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div id="patients" class="mt-4">
                                @foreach ($patients as $index => $patient)
                                    <div class="flex items-center patient-row mb-4" data-index="{{ $index }}">
                                        <div class="w-1/2 pr-2">
                                            <label for="patient_id_{{ $index }}"
                                                class="block text-sm font-medium text-gray-700">Patient</label>
                                            <select id="patient_id_{{ $index }}"
                                                name="patients[{{ $index }}][id]" required
                                                class="patient-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                <option value="">Select a patient</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}"
                                                        data-balance="{{ $patient->balance }}">{{ $patient->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="w-1/2 pl-2">
                                            <label for="patient_balance_{{ $index }}"
                                                class="block text-sm font-medium text-gray-700">Balance</label>
                                            <input type="number" name="patients[{{ $index }}][patient_balance]"
                                                id="patient_balance_{{ $index }}" step="0.01" min="0"
                                                required
                                                class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                                readonly>
                                        </div>
                                        <button type="button"
                                            class="remove-patient ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-patient"
                                class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px- rounded">Add
                                Patient</button>
                        </div>

                        <div>
                            <label for="issued_by" class="block text-sm font-medium text-gray-700">Issued By</label>
                            <select id="issued_by" name="issued_by" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="doctor_id" class="block text-sm font-medium text-gray-700">Doctor</label>
                            <select id="doctor_id" name="doctor_id" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="prescription"
                                class="block text-sm font-medium text-gray-700">Prescription</label>
                            <input type="text" name="prescription" id="prescription"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div>
                            <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                            <input type="number" name="discount" id="discount" step="0.01" min="0"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>



                        {{-- <h3 class="text-lg font-medium text-gray-900">Procedures</h3> --}}
                        <div id="procedures" class="mt-4">
                            @foreach ($procedures as $index => $procedure)
                                <div class="flex items-center procedure-row" data-index="{{ $index }}">
                                    <div class="w-1/2 pr-2">
                                        <label for="procedure_id_{{ $index }}"
                                            class="block text-sm font-medium text-gray-700">Procedure</label>
                                        <select id="procedure_id_{{ $index }}"
                                            name="procedures[{{ $index }}][id]" required
                                            class="procedure-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="{{ $procedure->id }}" data-cost="{{ $procedure->amount }}">
                                                {{ $procedure->name }}</option>
                                        </select>
                                    </div>
                                    <div class="w-1/2 pl-2">
                                        <label for="procedure_cost_{{ $index }}"
                                            class="block text-sm font-medium text-gray-700">Cost</label>
                                        <input type="number" name="procedures[{{ $index }}][procedure_cost]"
                                            id="procedure_cost_{{ $index }}" step="0.01" min="0"
                                            required
                                            class="procedure-cost mt-1 block w-full pl-2 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                            value="{{ $procedure->amount }}" readonly>
                                    </div>
                                    <button type="button"
                                        class="remove-procedure ml-3 bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-2 rounded">
                                        X</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-procedure"
                            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                            Procedure</button>

                        <div class="mt-8">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create
                                Receipt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let procedureIndex = {{ count($procedures) }};
            let patientIndex = {{ count($patients) }};

            const proceduresContainer = document.getElementById('procedures');
            const patientsContainer = document.getElementById('patients');
            const addProcedureButton = document.getElementById('add-procedure');
            const addPatientButton = document.getElementById('add-patient');

            // Function to update procedure cost based on selected procedure
            function updateCost(event) {
                const costInput = event.target.parentNode.nextElementSibling.querySelector('input.procedure-cost');
                const selectedOption = event.target.options[event.target.selectedIndex];
                costInput.value = selectedOption.getAttribute('data-cost');
            }

            // Function to update patient balance based on selected patient
            function updateBalance(event) {
                const balanceInput = event.target.parentNode.nextElementSibling.querySelector(
                    'input.patient-balance');
                const selectedOption = event.target.options[event.target.selectedIndex];
                balanceInput.value = selectedOption.getAttribute('data-balance');
            }

            // Function to add a new procedure row
            function addProcedure() {
                // Create a new row element
                const row = document.createElement('div');
                row.className = 'flex items-center procedure-row';
                row.dataset.index = procedureIndex;

                // HTML content for the new row
                row.innerHTML = `
                            <div class="w-1/2 pr-2">
                                <label for="procedure_id_${procedureIndex}" class="block text-sm font-medium text-gray-700">Procedure</label>
                                <select id="procedure_id_${procedureIndex}" name="procedures[${procedureIndex}][id]" required class="procedure-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">Select a procedure</option>
                                    @foreach ($procedures as $procedure)
                                        <option value="{{ $procedure->id }}" data-cost="{{ $procedure->amount }}">{{ $procedure->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-1/2 pl-2">
                                <label for="procedure_cost_${procedureIndex}" class="block text-sm font-medium text-gray-700">Cost</label>
                                <input type="number" name="procedures[${procedureIndex}][procedure_cost]" id="procedure_cost_${procedureIndex}" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                            </div>
                            <button type="button" class="remove-procedure ml-2 text-red-500">Remove</button>
                        `;

                // Append the new row to the procedures container
                proceduresContainer.appendChild(row);

                // Add event listener to the new select element
                row.querySelector('.procedure-select').addEventListener('change', updateCost);

                // Add event listener to the new remove button
                row.querySelector('.remove-procedure').addEventListener('click', removeProcedure);

                // Increment the procedure index
                procedureIndex++;
            }

            // Function to remove a procedure row
            function removeProcedure(event) {
                event.target.closest('.procedure-row').remove();
            }

            // Function to add a new patient row
            function addPatient() {
                // Create a new row element
                const row = document.createElement('div');
                row.className = 'flex items-center patient-row mb-4';
                row.dataset.index = patientIndex;

                // HTML content for the new row
                row.innerHTML = `
                            <div class="w-1/2 pr-2">
                                <label for="patient_id_${patientIndex}" class="block text-sm font-medium text-gray-700">Patient</label>
                                <select id="patient_id_${patientIndex}" name="patients[${patientIndex}][id]" required class="patient-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">Select a patient</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}" data-balance="{{ $patient->balance }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-1/2 pl-2">
                                <label for="patient_balance_${patientIndex}" class="block text-sm font-medium text-gray-700">Balance</label>
                                <input type="number" name="patients[${patientIndex}][patient_balance]" id="patient_balance_${patientIndex}" step="0.01" min="0" required class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                            </div>
                            <button type="button" class="remove-patient ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                        `;

                // Append the new row to the patients container
                patientsContainer.appendChild(row);

                // Add event listener to the new select element
                row.querySelector('.patient-select').addEventListener('change', updateBalance);

                // Add event listener to the new remove button
                row.querySelector('.remove-patient').addEventListener('click', removePatient);

                // Increment the patient index
                patientIndex++;
            }

            // Function to remove a patient row
            function removePatient(event) {
                event.target.closest('.patient-row').remove();
            }

            // Event listener for adding a new procedure
            addProcedureButton.addEventListener('click', addProcedure);

            // Event listener for adding a new patient
            addPatientButton.addEventListener('click', addPatient);

            // Initial setup: add event listeners to existing elements
            document.querySelectorAll('.procedure-select').forEach(select => {
                select.addEventListener('change', updateCost);
            });

            document.querySelectorAll('.patient-select').forEach(select => {
                select.addEventListener('change', updateBalance);
            });

            document.querySelectorAll('.remove-procedure').forEach(button => {
                button.addEventListener('click', removeProcedure);
            });

            document.querySelectorAll('.remove-patient').forEach(button => {
                button.addEventListener('click', removePatient);
            });
        });
    </script>

</x-app-layout>











<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Receipt') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('receipts.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div id="patients" class="mt-4">
                                <div class="flex items-center patient-row mb-4" data-index="0">
                                    <div class="w-1/2 pr-2">
                                        <label for="patient_id_0" class="block text-sm font-medium text-gray-700">Patient</label>
                                        <select id="patient_id_0" name="patients[0][id]" required class="patient-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="">Select a patient</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}" data-balance="{{ $patient->balance }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/2 pl-2">
                                        <label for="patient_balance_0" class="block text-sm font-medium text-gray-700">Balance</label>
                                        <input type="number" name="patients[0][patient_balance]" id="patient_balance_0" step="0.01" min="0" required class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                                    </div>
                                    <button type="button" class="remove-patient ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                                </div>
                            </div>
                            <button type="button" id="add-patient" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Patient</button>
                        </div>

                        <div>
                            <label for="issued_by" class="block text-sm font-medium text-gray-700">Issued By</label>
                            <select id="issued_by" name="issued_by" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="doctor_id" class="block text-sm font-medium text-gray-700">Doctor</label>
                            <select id="doctor_id" name="doctor_id" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="prescription" class="block text-sm font-medium text-gray-700">Prescription</label>
                            <input type="text" name="prescription" id="prescription" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div>
                            <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                            <input type="number" name="discount" id="discount" step="0.01" min="0" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div id="procedures" class="mt-4">
                            <div class="flex items-center procedure-row mb-4" data-index="0">
                                <div class="w-1/2 pr-2">
                                    <label for="procedure_id_0" class="block text-sm font-medium text-gray-700">Procedure</label>
                                    <select id="procedure_id_0" name="procedures[0][id]" required class="procedure-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="">Select a procedure</option>
                                        @foreach ($procedures as $procedure)
                                            <option value="{{ $procedure->id }}" data-cost="{{ $procedure->amount }}">{{ $procedure->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-1/2 pl-2">
                                    <label for="procedure_cost_0" class="block text-sm font-medium text-gray-700">Cost</label>
                                    <input type="number" name="procedures[0][procedure_cost]" id="procedure_cost_0" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-2 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                                </div>
                                <button type="button" class="remove-procedure ml-3 bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-2 rounded">X</button>
                            </div>
                        </div>
                        <button type="button" id="add-procedure" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Procedure</button>

                        <div class="mt-8">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Receipt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let patientIndex = 1;
            let procedureIndex = 1;

            document.getElementById('add-patient').addEventListener('click', function () {
                let patientsDiv = document.getElementById('patients');
                let newPatientRow = document.createElement('div');
                newPatientRow.classList.add('flex', 'items-center', 'patient-row', 'mb-4');
                newPatientRow.setAttribute('data-index', patientIndex);

                newPatientRow.innerHTML = `
                    <div class="w-1/2 pr-2">
                        <label for="patient_id_${patientIndex}" class="block text-sm font-medium text-gray-700">Patient</label>
                        <select id="patient_id_${patientIndex}" name="patients[${patientIndex}][id]" required class="patient-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Select a patient</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" data-balance="{{ $patient->balance }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2 pl-2">
                        <label for="patient_balance_${patientIndex}" class="block text-sm font-medium text-gray-700">Balance</label>
                        <input type="number" name="patients[${patientIndex}][patient_balance]" id="patient_balance_${patientIndex}" step="0.01" min="0" required class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                    </div>
                    <button type="button" class="remove-patient ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                `;

                patientsDiv.appendChild(newPatientRow);
                patientIndex++;
            });

            document.getElementById('patients').addEventListener('change', function (e) {
                if (e.target.classList.contains('patient-select')) {
                    let selectedOption = e.target.options[e.target.selectedIndex];
                    let balance = selectedOption.getAttribute('data-balance');
                    let balanceInput = e.target.closest('.patient-row').querySelector('.patient-balance');
                    balanceInput.value = balance;
                }
            });

            document.getElementById('patients').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-patient')) {
                    e.target.parentElement.remove();
                }
            });

            document.getElementById('add-procedure').addEventListener('click', function () {
                let proceduresDiv = document.getElementById('procedures');
                let newProcedureRow = document.createElement('div');
                newProcedureRow.classList.add('flex', 'items-center', 'procedure-row', 'mb-4');
                newProcedureRow.setAttribute('data-index', procedureIndex);

                newProcedureRow.innerHTML = `
                    <div class="w-1/2 pr-2">
                        <label for="procedure_id_${procedureIndex}" class="block text-sm font-medium text-gray-700">Procedure</label>
                        <select id="procedure_id_${procedureIndex}" name="procedures[${procedureIndex}][id]" required class="procedure-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Select a procedure</option>
                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->id }}" data-cost="{{ $procedure->amount }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2 pl-2">
                        <label for="procedure_cost_${procedureIndex}" class="block text-sm font-medium text-gray-700">Cost</label>
                        <input type="number" name="procedures[${procedureIndex}][procedure_cost]" id="procedure_cost_${procedureIndex}" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-2 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                    </div>
                    <button type="button" class="remove-procedure ml-3 bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-2 rounded">X</button>
                `;

                proceduresDiv.appendChild(newProcedureRow);
                procedureIndex++;
            });

            document.getElementById('procedures').addEventListener('change', function (e) {
                if (e.target.classList.contains('procedure-select')) {
                    let selectedOption = e.target.options[e.target.selectedIndex];
                    let cost = selectedOption.getAttribute('data-cost');
                    let costInput = e.target.closest('.procedure-row').querySelector('.procedure-cost');
                    costInput.value = cost;
                }
            });

            document.getElementById('procedures').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-procedure')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>
</x-app-layout>

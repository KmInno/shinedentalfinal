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

                    <form id="receipt-form" action="{{ route('receipts.store') }}" method="POST">
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
                                        <input type="number" name="patients[0][balance]" id="patient_balance_0" step="0.01" min="0" required class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
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
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
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
                                    <input type="number" name="procedures[0][cost]" id="procedure_cost_0" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
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
        document.addEventListener('DOMContentLoaded', function() {
            let patientIndex = 1;
            let procedureIndex = 1;

            document.getElementById('add-patient').addEventListener('click', function() {
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
                        <input type="number" name="patients[${patientIndex}][balance]" id="patient_balance_${patientIndex}" step="0.01" min="0" required class="patient-balance mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                    </div>
                    <button type="button" class="remove-patient ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                `;

                patientsDiv.appendChild(newPatientRow);
                attachEventListenersToSelect(newPatientRow.querySelector('.patient-select'), '.patient-balance');
                attachRemoveButtonListener(newPatientRow.querySelector('.remove-patient'));
                patientIndex++;
            });

            document.getElementById('add-procedure').addEventListener('click', function() {
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
                        <input type="number" name="procedures[${procedureIndex}][cost]" id="procedure_cost_${procedureIndex}" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                    </div>
                    <button type="button" class="remove-procedure ml-3 bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-2 rounded">X</button>
                `;

                proceduresDiv.appendChild(newProcedureRow);
                attachEventListenersToSelect(newProcedureRow.querySelector('.procedure-select'), '.procedure-cost');
                attachRemoveButtonListener(newProcedureRow.querySelector('.remove-procedure'));
                procedureIndex++;
            });

            function attachEventListenersToSelect(selectElement, inputClass) {
                selectElement.addEventListener('change', function(e) {
                    let selectedOption = e.target.options[e.target.selectedIndex];
                    let value = selectedOption.getAttribute('data-' + inputClass.split('-')[1]);
                    let input = e.target.closest('.flex').querySelector(inputClass);
                    input.value = value;
                });
            }

            function attachRemoveButtonListener(button) {
                button.addEventListener('click', function(e) {
                    e.target.parentElement.remove();
                });
            }

            // Initial attachment for dynamically created elements
            document.querySelectorAll('.patient-select').forEach(selectElement => {
                attachEventListenersToSelect(selectElement, '.patient-balance');
            });

            document.querySelectorAll('.procedure-select').forEach(selectElement => {
                attachEventListenersToSelect(selectElement, '.procedure-cost');
            });

            document.querySelectorAll('.remove-patient').forEach(button => {
                attachRemoveButtonListener(button);
            });

            document.querySelectorAll('.remove-procedure').forEach(button => {
                attachRemoveButtonListener(button);
            });
        });
    </script>
</x-app-layout>

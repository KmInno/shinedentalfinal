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
                        <div>
                            <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                            <select id="patient_id" name="patient_id" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Select a patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
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
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
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
                            <label for="balance" class="block text-sm font-medium text-gray-700">Balance</label>
                            <input type="number" name="balance" id="balance" step="0.01" min="0"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        </div>

                        <div id="procedures" class="mt-4">
                            <select id="procedure_id" name="procedure_id" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Select a procedure</option>
                                @foreach ($procedures as $procedure)
                                    <option value="{{ $procedure->id }}" data-cost="{{ $procedure->amount }}">
                                        {{ $procedure->name }}</option>
                                @endforeach
                            </select>
                            <!-- Procedure selection and cost fields -->
                        </div>

                        <button type="button" id="add-procedure"
                            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                            Procedure</button>

                        <!-- Calculate button -->
                        <div class="mt-8">
                            <button type="button" id="calculate"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Calculate
                                Total</button>
                        </div>

                        <!-- Total cost display -->
                        <div class="mt-4" id="total-cost"></div>

                        <!-- Submit button -->
                        <div class="mt-4">
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
        document.addEventListener('DOMContentLoaded', function() {
            let procedureIndex = 0;

            document.getElementById('add-procedure').addEventListener('click', function() {
                let proceduresDiv = document.getElementById('procedures');
                let newProcedureRow = document.createElement('div');
                newProcedureRow.classList.add('flex', 'items-center', 'procedure-row', 'mb-4');
                newProcedureRow.setAttribute('data-index', procedureIndex);

                newProcedureRow.innerHTML = `
                    <div class="w-1/2 pr-2">
                        <label for="procedure_name_${procedureIndex}" class="block text-sm font-medium text-gray-700">Procedure</label>
                        <select id="procedure_name_${procedureIndex}" name="procedures[${procedureIndex}][name]" required class="procedure-select mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Select a procedure</option>
                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->name }}" data-id="{{ $procedure->id }}" data-cost="{{ $procedure->amount }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="procedures[${procedureIndex}][id]" id="procedure_id_${procedureIndex}">
                    </div>
                    <div class="w-1/2 pl-2">
                        <label for="procedure_cost_${procedureIndex}" class="block text-sm font-medium text-gray-700">Cost</label>
                        <input type="number" name="procedures[${procedureIndex}][cost]" id="procedure_cost_${procedureIndex}" step="0.01" min="0" required class="procedure-cost mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
                    </div>
                    <button type="button" class="remove-procedure ml-3 bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-2 rounded">X</button>
                `;

                proceduresDiv.appendChild(newProcedureRow);
                attachEventListenersToSelect(newProcedureRow.querySelector('.procedure-select'),
                    '.procedure-cost', '.procedure-id');
                attachRemoveButtonListener(newProcedureRow.querySelector('.remove-procedure'));
                procedureIndex++;
            });

            document.querySelectorAll('.procedure-select').forEach(selectElement => {
                attachEventListenersToSelect(selectElement, '.procedure-cost', '.procedure-id');
            });

            document.querySelectorAll('.remove-procedure').forEach(button => {
                attachRemoveButtonListener(button);
            });

            document.getElementById('calculate').addEventListener('click', function() {
                let totalCost = 0;
                document.querySelectorAll('.procedure-cost').forEach(input => {
                    totalCost += parseFloat(input.value) || 0;
                });

                let balance = parseFloat(document.getElementById('balance').value) || 0;
                totalCost += balance;

                document.getElementById('total-cost').innerText = `Total Cost: UGX${totalCost.toFixed(2)}`;
            });

            function attachEventListenersToSelect(selectElement, costInputClass, idInputClass) {
                selectElement.addEventListener('change', function(e) {
                    let selectedOption = e.target.options[e.target.selectedIndex];
                    let cost = selectedOption.getAttribute('data-cost');
                    let id = selectedOption.getAttribute('data-id');
                    let costInput = e.target.closest('.flex').querySelector(costInputClass);
                    let idInput = e.target.closest('.flex').querySelector(idInputClass);
                    costInput.value = cost;
                    idInput.value = id;
                });
            }

            function attachRemoveButtonListener(button) {
                button.addEventListener('click', function(e) {
                    e.target.parentElement.remove();
                });
            }
        });
    </script>
</x-app-layout>

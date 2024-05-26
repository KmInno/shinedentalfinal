<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Appointment') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="patient_id" class="block text-gray-700">Patient</label>
                    <select id="patient_id" name="patient_id" class="form-select mt-1 block w-full">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea id="description" name="description" class="form-input mt-1 block w-full"></textarea>
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-700">Time</label>
                    <input type="datetime-local" id="time" name="time" class="form-input mt-1 block w-full">
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <select id="status" name="status" class="form-select mt-1 block w-full">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="rejected by doctor">Rejected by Doctor</option>
                        <option value="cancelled by patient">Cancelled by Patient</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="employee_id" class="block text-gray-700">Employee</label>
                    <select id="employee_id" name="employee_id" class="form-select mt-1 block w-full">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="procedure_id" class="block text-gray-700">Procedure</label>
                    <select id="procedure_id" name="procedure_id" class="form-select mt-1 block w-full">
                        @foreach($procedures as $procedure)
                            <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

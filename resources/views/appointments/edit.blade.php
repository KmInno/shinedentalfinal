<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="patient_id" class="block text-gray-700">Patient</label>
                    <select id="patient_id" name="patient_id" class="form-select mt-1 block w-full">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea id="description" name="description" class="form-input mt-1 block w-full">{{ $appointment->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-700">Time</label>
                    <input type="datetime-local" id="time" name="time" value="{{ \Carbon\Carbon::parse($appointment->time)->format('Y-m-d\TH:i') }}" class="form-input mt-1 block w-full">

                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <select id="status" name="status" class="form-select mt-1 block w-full">
                        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="rejected by doctor" {{ $appointment->status == 'rejected by doctor' ? 'selected' : '' }}>Rejected by Doctor</option>
                        <option value="cancelled by patient" {{ $appointment->status == 'cancelled by patient' ? 'selected' : '' }}>Cancelled by Patient</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="employee_id" class="block text-gray-700">Employee</label>
                    <select id="employee_id" name="employee_id" class="form-select mt-1 block w-full">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $appointment->employee_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="procedure_id" class="block text-gray-700">Procedure</label>
                    <select id="procedure_id" name="procedure_id" class="form-select mt-1 block w-full">
                        @foreach($procedures as $procedure)
                            <option value="{{ $procedure->id }}" {{ $appointment->procedure_id == $procedure->id ? 'selected' : '' }}>
                                {{ $procedure->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update Appointment</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

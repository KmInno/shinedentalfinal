<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Patient</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $appointment->patient->name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $appointment->description }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Time</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $appointment->time }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $appointment->status }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Employee</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $appointment->employee->name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Procedure</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $appointment->procedure->name }}</dd>
                </div>
            </dl>
            <div class="mt-6 flex justify-end">
                <a href="{{ route('appointments.edit', $appointment) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit</a>
            </div>
        </div>
    </div>
</x-app-layout>

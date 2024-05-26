<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <dl class="divide-y divide-gray-200">
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->name }} {{ $patient->middle_name }} {{ $patient->last_name }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Contact</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->contact }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Age</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->age }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->gender }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->address }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Procedure</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->procedure->name }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="text-sm text-gray-900">{{ $patient->description }}</dd>
                    </div>
                    <div class="py-4 flex justify-between">
                        <dt class="text-sm font-medium text-gray-500">Balance</dt>
                        <dd class="text-sm text-gray-900">UGX {{ $patient->balance }}</dd>
                    </div>
                </dl>
                <div class="flex justify-between mt-4">
                    <a href="{{ route('patients.edit', $patient) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit</a>
                    <form action="{{ route('patients.destroy', $patient) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

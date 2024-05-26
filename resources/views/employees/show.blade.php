<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold">{{ $employee->name }}</h3>
                <p class="text-gray-700">{{ $employee->email }}</p>
                <p class="text-gray-700">{{ $employee->phone }}</p>
                <p class="text-gray-700">Department: {{ $employee->department->name }}</p>
                <p class="text-gray-700">Speciality: {{ $employee->speciality }}</p>
                <p class="text-gray-700">Working Days: {{ $employee->working_days }}</p>
                <p class="text-gray-700">Working Hours: {{ $employee->working_hours }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('employees.edit', $employee) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit</a>
            </div>
        </div>
    </div>
</x-app-layout>

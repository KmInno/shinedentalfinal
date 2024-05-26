{{-- resources/views/departments/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Department
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Department Details</h1>

                <div class="mb-4">
                    <label class="block text-gray-700">Name:</label>
                    <p>{{ $department->name }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Description:</label>
                    <p>{{ $department->description }}</p>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('departments.edit', $department) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

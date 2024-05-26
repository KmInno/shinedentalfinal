{{-- resources/views/departments/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Department
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Create New Department</h1>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Name:</label>
                        <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description:</label>
                        <textarea name="description" id="description" class="form-textarea mt-1 block w-full">{{ old('description') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

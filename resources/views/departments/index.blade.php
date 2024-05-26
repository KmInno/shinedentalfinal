{{-- resources/views/departments/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Departments
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="flex justify-between items-center mb-4">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6"> --}}
                {{-- <div class="flex justify-between items-center mb-4"> --}}
                    <h1 class="text-2xl font-semibold">Departments</h1>
                    <a href="{{ route('departments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Department</a>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div>
                    @if($departments->isEmpty())
                        <p>No departments available.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($departments as $department)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $department->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $department->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $department->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('departments.show', $department) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                            <a href="{{ route('departments.edit', $department) }}" class="ml-4 text-yellow-500 hover:text-yellow-700">Edit</a>
                                            <form action="{{ route('departments.destroy', $department) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="ml-4 text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

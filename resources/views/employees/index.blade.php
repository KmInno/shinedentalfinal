<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Employees</h1>
            <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add New Employee</a>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Speciality</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->department->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->speciality }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('employees.show', $employee) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                <a href="{{ route('employees.edit', $employee) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Patients</h1>
            <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add New Patient</a>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Procedure</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($patients as $patient)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $patient->name }} {{ $patient->middle_name }} {{ $patient->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $patient->contact }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $patient->age }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $patient->procedure->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">UGX {{ $patient->balance }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('patients.show', $patient) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                <a href="{{ route('patients.edit', $patient) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline-block">
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

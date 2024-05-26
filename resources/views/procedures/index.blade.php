<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Procedures') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Procedures</h1>
            <a href="{{ route('procedures.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add New Procedure</a>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($procedures as $procedure)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $procedure->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $procedure->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">UGX {{ $procedure->amount }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $procedure->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('procedures.show', $procedure) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                <a href="{{ route('procedures.edit', $procedure) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                <form action="{{ route('procedures.destroy', $procedure) }}" method="POST" class="inline-block">
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

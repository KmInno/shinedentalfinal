<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipts') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('receipts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Receipt</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issued By</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prescription</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Procedure</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($receipts as $receipt)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->patient->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->issuer->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->doctor->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->prescription }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->procedure->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->balance }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->total_cost }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('receipts.show', $receipt->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('receipts.edit', $receipt->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('receipts.destroy', $receipt->id) }}" method="POST" class="inline">
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
        </div>
    </div>
</x-app-layout>

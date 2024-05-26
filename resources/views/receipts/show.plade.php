<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipt Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('receipts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Receipts</a>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Receipt Information</h3>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Patient:</label>
                        <p class="text-gray-900">{{ $receipt->patient->name ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Issued By:</label>
                        <p class="text-gray-900">{{ $receipt->issuer->name ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Doctor:</label>
                        <p class="text-gray-900">{{ $receipt->doctor->name ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Prescription:</label>
                        <p class="text-gray-900">{{ $receipt->prescription ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Balance:</label>
                        <p class="text-gray-900">{{ $receipt->balance ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Discount:</label>
                        <p class="text-gray-900">{{ $receipt->discount ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Total Charge:</label>
                        <p class="text-gray-900">{{ $receipt->total_charge }}</p>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('receipts.edit', $receipt->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Receipt</a>
                        <form action="{{ route('receipts.destroy', $receipt->id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Receipt</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

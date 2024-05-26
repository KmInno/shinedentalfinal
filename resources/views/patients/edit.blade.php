<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('patients.update', $patient) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->name }}" required>
                            </div>
                            <div>
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->middle_name }}">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->last_name }}" required>
                            </div>
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->date->format('Y-m-d') }}" required>
                            </div>
                            <div>
                                <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                                <input type="text" name="contact" id="contact" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->contact }}" required>
                            </div>
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="others" {{ $patient->gender == 'others' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                            <div>
                                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                                <input type="number" name="age" id="age" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->age }}" required>
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea name="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $patient->address }}</textarea>
                            </div>
                            <div>
                                <label for="procedure_id" class="block text-sm font-medium text-gray-700">Procedure</label>
                                <select name="procedure_id" id="procedure_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    @foreach($procedures as $procedure)
                                        <option value="{{ $procedure->id }}" {{ $patient->procedure_id == $procedure->id ? 'selected' : '' }}>{{ $procedure->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $patient->description }}</textarea>
                            </div>
                            <div>
                                <label for="balance" class="block text-sm font-medium text-gray-700">Balance</label>
                                <input type="text" name="balance" id="balance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $patient->balance }}" required>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-input mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="department_id" class="block text-gray-700">Department</label>
                    <select id="department_id" name="department_id" class="form-select mt-1 block w-full" required>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="speciality" class="block text-gray-700">Speciality</label>
                    <input type="text" id="speciality" name="speciality" class="form-input mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="working_days" class="block text-gray-700">Working Days</label>
                    <input type="text" id="working_days" name="working_days" class="form-input mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="working_hours" class="block text-gray-700">Working Hours</label>
                    <input type="text" id="working_hours" name="working_hours" class="form-input mt-1 block w-full" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Create Employee</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<!-- resources/views/components/sidebar.blade.php -->
<div class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4">
        <h2 class="text-xl font-semibold">Navigation</h2>
        <ul class="mt-4 space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Home</a>
            </li>
            <li>
                <a href="{{ route('patients.index') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Patients</a>
            </li>
            <li>
                <a href="{{ route('procedures.index') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Procedures</a>
            </li>
            <li>
                <a href="{{ route('departments.index') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Departments</a>
            </li>
            <li>
                <a href="{{ route('employees.index') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Employees</a>
            </li>
            <li>
                <a href="{{ route('appointments.index') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Appointments</a>
            </li>
            <li>
                <a href="{{ route('receipts.index') }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white rounded">Receipts</a>
            </li>
            <!-- Add more navigation links as needed -->
        </ul>
    </div>
</div>

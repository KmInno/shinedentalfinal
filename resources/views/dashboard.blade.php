<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        <li>
                            <a href="{{ route('patients.index') }}"
                                class="block p-4 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 3.293a1 1 0 011.414 0L10 4.586l1.293-1.293a1 1 0 111.414 1.414L11.414 6l1.293 1.293a1 1 0 11-1.414 1.414L10 7.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 6 7.293 4.707a1 1 0 010-1.414zM6 10a4 4 0 118 0 4 4 0 01-8 0zm1 0a3 3 0 105.999.001A3 3 0 007 10z"
                                        clip-rule="evenodd" />
                                </svg>
                                Patients
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('procedures.index') }}"
                                class="block p-4 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M13.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L16.586 11H5a1 1 0 010-2h11.586l-4.293-4.293a1 1 0 010-1.414zM3 5a1 1 0 011-1h3a1 1 0 110 2H4a1 1 0 01-1-1zm0 10a1 1 0 011-1h7a1 1 0 110 2H4a1 1 0 01-1-1zm12-6a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                                Procedures
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('departments.index') }}"
                                class="block p-4 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1.586l1.707-1.707a1 1 0 111.414 1.414L11.414 6l1.707 1.707a1 1 0 11-1.414 1.414L10 8.414l-1.707 1.707a1 1 0 11-1.414-1.414L8.586 7.586 6.879 5.879a1 1 0 111.414-1.414L9 4.586V3a1 1 0 011-1zm8 4a1 1 0 100-2h-1.586l1.293-1.293a1 1 0 10-1.414-1.414L15 3.586 13.707 2.293a1 1 0 00-1.414 1.414L13.414 5H12a1 1 0 100 2h1.586l-1.293 1.293a1 1 0 001.414 1.414L15 6.414 16.293 7.707a1 1 0 001.414-1.414L17.414 5H18a1 1 0 100-2zM6 14a1 1 0 011-1h1.586l-1.293-1.293a1 1 0 111.414-1.414L9 12.586l1.707-1.707a1 1 0 111.414 1.414L10.414 14l1.707 1.707a1 1 0 11-1.414 1.414L9 15.414 7.293 17.121a1 1 0 01-1.414-1.414L6.586 15H5a1 1 0 01-1-1zm8 0a1 1 0 100-2h-1.586l1.293-1.293a1 1 0 10-1.414-1.414L13 12.586l-1.707-1.707a1 1 0 10-1.414 1.414L11.586 14l-1.707 1.707a1 1 0 101.414 1.414L13 15.414l1.707 1.707a1 1 0 001.414-1.414L14.414 14H16a1 1 0 100-2z"
                                        clip-rule="evenodd" />
                                </svg>
                                Departments
                            </a>
                        </li <li>
                        <a href="{{ route('employees.index') }}"
                            class="block p-4 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500 mr-2"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 3.293a1 1 0 011.414 0L10 4.586l1.293-1.293a1 1 0 111.414 1.414L11.414 6l1.293 1.293a1 1 0 11-1.414 1.414L10 7.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 6 7.293 4.707a1 1 0 010-1.414zM6 10a4 4 0 118 0 4 4 0 01-8 0zm1 0a3 3 0 105.999.001A3 3 0 007 10z"
                                    clip-rule="evenodd" />
                            </svg>
                            Employees
                        </a>
                        </li>
                        <li>
                            <a href="{{ route('appointments.index') }}"
                                class="block p-4 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M13.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L16.586 11H5a1 1 0 010-2h11.586l-4.293-4.293a1 1 0 011.414-1.414zM3 5a1 1 0 011-1h3a1 1 0 110 2H4a1 1 0 01-1-1zm0 10a1 1 0 011-1h7a1 1 0 110 2H4a1 1 0 01-1-1zm12-6a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                                Appointments
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('receipts.index') }}"
                                class="block p-4 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 3.293a1 1 0 011.414 0L10 4.586l1.293-1.293a1 1 0 111.414 1.414L11.414 6l1.293 1.293a1 1 0 11-1.414 1.414L10 7.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 6 7.293 4.707a1 1 0 010-1.414zM6 10a4 4 0 118 0 4 4 0 01-8 0zm1 0a3 3 0 105.999.001A3 3 0 007 10z"
                                        clip-rule="evenodd" />
                                </svg>
                                Receipts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

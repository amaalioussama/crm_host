<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center  bg-gray-100 mt-9">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">Welcome, {{ Auth::user()->username }}!</h3>
                <p class="text-gray-600 mt-2">You can update your status and country here.</p>
            </div>

            <!-- Fetch User's Data from Employee Table -->
            @php
                $employee = \App\Models\Employee::where('surname', Auth::user()->username)->first();
            @endphp

            @if($employee)
                <div class="text-gray-700 mb-6">
                    <h4 class="font-semibold text-lg">Your Details:</h4>
                    <p><strong>Name:</strong> {{ $employee->name }} {{ $employee->surname }}</p>
                    <p><strong>Email:</strong> {{ $employee->email }}</p>
                    <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                    <p><strong>Country:</strong> {{ $employee->country }}</p>
                    <p><strong>Status:</strong> {{ $employee->status }}</p>
                    <p><strong>Employee of:</strong> {{ $employee->employee_of }}</p>
                </div>

                <!-- Status and Country Update Form -->
                <form action="{{ url('/user/update/' . $employee->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Status Update -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="New" {{ $employee->status == 'New' ? 'selected' : '' }}>New</option>
                            <option value="Call back" {{ $employee->status == 'Call back' ? 'selected' : '' }}>Call back</option>
                            <option value="Appointment" {{ $employee->status == 'Appointment' ? 'selected' : '' }}>Appointment</option>
                            <option value="Voice mail" {{ $employee->status == 'Voice mail' ? 'selected' : '' }}>Voice mail</option>
                            <option value="Wrong language" {{ $employee->status == 'Wrong language' ? 'selected' : '' }}>Wrong language</option>
                            <option value="Trash" {{ $employee->status == 'Trash' ? 'selected' : '' }}>Trash</option>
                        </select>
                    </div>

                    <!-- Country Update -->
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                        <select name="country" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="country">
                            <option value="{{ $employee->country }}" selected>{{ $employee->country }}</option>
                            <!-- Country options will be dynamically populated here -->
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Update Details</button>
                </form>
            @else
                <p class="mt-4">No employee found with your username.</p>
            @endif
        </div>
    </div>

    <!-- Fetch countries data from the REST Countries API -->
    <script>
        // Fetch the countries data from API and populate the country select field
        function populateCountryDropdown() {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    const countrySelect = document.getElementById('country');
                    data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.name.common;  // Use the country name as value
                        option.textContent = country.name.common;  // Country name
                        countrySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching country data:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            populateCountryDropdown();
        });
    </script>
</x-app-layout>

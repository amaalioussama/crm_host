<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Content Container -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Filter Form -->
                <div class="p-6 bg-gray-50 mt-10">
                    <form action="{{ route('dashboard') }}" method="GET">
                        <div class="flex justify-between items-center space-x-4">
                            <!-- Status Filter -->
                            <div>
                                <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                                <select name="status" class="form-control mt-1">
                                    <option value="">Select Status</option>
                                    <option value="New" {{ request()->get('status') == 'New' ? 'selected' : '' }}>New</option>
                                    <option value="Call back" {{ request()->get('status') == 'Call back' ? 'selected' : '' }}>Call back</option>
                                    <option value="Appointment" {{ request()->get('status') == 'Appointment' ? 'selected' : '' }}>Appointment</option>
                                    <option value="Voice mail" {{ request()->get('status') == 'Voice mail' ? 'selected' : '' }}>Voice mail</option>
                                    <option value="Wrong language" {{ request()->get('status') == 'Wrong language' ? 'selected' : '' }}>Wrong language</option>
                                    <option value="Trash" {{ request()->get('status') == 'Trash' ? 'selected' : '' }}>Trash</option>
                                </select>
                            </div>

                            <!-- Country Filter -->
                            <div>
                                <label for="country" class="text-sm font-medium text-gray-700">Country</label>
                                <select name="country" class="form-control mt-1" id="country-filter">
                                    <option value="">Select Country</option>
                                    <!-- Country options will be populated here -->
                                </select>
                            </div>

                            <!-- Surname Search -->
                            <div>
                                <label for="surname" class="text-sm font-medium text-gray-700">Search</label>
                                <input type="text" name="surname" class="form-control mt-1" value="{{ request()->get('surname') }}" placeholder="Search by surname">
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="btn btn-primary mt-6">Filter</button>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Show All Clients</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="p-6 bg-gray-50 mt-10">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-semibold">Manage Clients</h3>
                        <button id="addEmployeeBtn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                            <i class="bi bi-person-plus"></i> Add New Client
                        </button>
                    </div>
                </div>
                <!-- Employees Table -->
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-10">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Employee of</th>
                                <th>Comment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }} </td><td>{{ $employee->surname }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($employee->status == 'New') bg-success text-white 
                                            @elseif($employee->status == 'Call back') bg-danger text-white 
                                            @elseif($employee->status == 'Appointment') bg-warning text-dark 
                                            @elseif($employee->status == 'Voice mail') bg-info text-dark 
                                            @elseif($employee->status == 'Wrong language') bg-secondary text-white 
                                            @elseif($employee->status == 'Trash') bg-danger text-white 
                                            @endif">
                                            {{ $employee->status }}
                                        </span>
                                    </td>
                                    <td>{{ $employee->employee_of }}</td>
                                    <td>{{ $employee->comment }}</td>
                                    <td>
                                        <!-- Edit Button that Opens Modal -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEmployeeModal{{ $employee->id }}">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>

                                        <a href="{{ route('employee.delete', $employee->id) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $employee->id }}').submit();">Delete</a>

                                        <form id="delete-form-{{ $employee->id }}" action="{{ route('employee.delete', $employee->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $employees->links() }} <!-- This will show pagination links -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Add Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employee.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" class="form-control mt-1" placeholder="Enter name" required>
                            </div>
                            <div>
                                <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                                <input type="text" name="surname" class="form-control mt-1" placeholder="Enter surname" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" class="form-control mt-1" placeholder="Enter phone number" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" class="form-control mt-1" placeholder="Enter email" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <select id="country" name="country" class="form-control mt-1" required>
                                    <option value="">Select a Country</option>
                                    <!-- Dynamically populated countries will appear here -->
                                </select>
                            </div>
                            <div>
                                <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                                <select name="status" class="form-control mt-1">
                                    <option value="">Select Status</option>
                                    <option value="New" class="bg-success text-white">New</option>
                                    <option value="Call back" class="bg-danger text-white">Call back</option>
                                    <option value="Appointment" class="bg-warning text-dark">Appointment</option>
                                    <option value="Voice mail" class="bg-info text-dark">Voice mail</option>
                                    <option value="Wrong language" class="bg-secondary text-white">Wrong language</option>
                                    <option value="Trash" class="bg-danger text-white">Trash</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="employee_of" class="block text-sm font-medium text-gray-700">Employee of</label>
                                <input type="text" name="employee_of" class="form-control mt-1" placeholder="Employee of" required>
                            </div>
                            <div>
                                <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                <input type="text" name="comment" class="form-control mt-1" placeholder="Comment (optional)">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 w-full">Add Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fetch countries data from the REST Countries API -->
    <script>
        function populateCountryDropdowns() {
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    const countryFilterSelect = document.getElementById('country-filter');
                    const countryModalSelects = document.querySelectorAll('#country');
                    data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.cca2;
                        option.textContent = country.name.common;
                        countryFilterSelect.appendChild(option);
                        countryModalSelects.forEach(select => {
                            const clonedOption = option.cloneNode(true);  
                            select.appendChild(clonedOption);
                        });
                    });
                })
                .catch(error => console.error('Error fetching country data:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            populateCountryDropdowns();
        });
    </script>
</x-app-layout>

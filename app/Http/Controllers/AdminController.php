<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show admin dashboard with employees
    // public function index(Request $request)
    // {
    //     // Check if the user is an admin
    //     if (Auth::user()->username != 'admin') {
    //         return redirect()->route('user.dashboard'); // Redirect non-admin users
    //     }
    
    //     // Continue with the employee management functionality
    //     $query = Employee::query();
    
    //     // Apply filters if set
    //     if ($request->has('status') && $request->status != '') {
    //         $query->where('status', $request->status);
    //     }
    
    //     if ($request->has('country') && $request->country != '') {
    //         $query->where('country', $request->country);
    //     }
    
    //     if ($request->has('surname') && $request->surname != '') {
    //         $query->where('surname', 'like', '%' . $request->surname . '%');
    //     }
    
    //     $employees = $query->get(); // Execute the query
    
    //     return view('dashboard', compact('employees')); // Return admin dashboard view
    // }
    public function index(Request $request)
    {
        // Check if the user is an admin
        // if (Auth::user()->username === "admin"){  // assuming 1 is for admin
        //     return redirect()->route('user.dashboard'); // Redirect non-admin users
        // }
        
        // Initialize query builder for employees
        $query = Employee::query();
        
        // Apply filters based on query parameters
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('country') && $request->country != '') {
            $query->where('country', $request->country);
        }
        
        if ($request->has('surname') && $request->surname != '') {
            $query->where('surname', 'like', '%' . $request->surname . '%');
        }
        
        // Paginate the results to 3 records per page
        $employees = $query->paginate(3); 
        
        // Return the dashboard view with the filtered and paginated employees
        return view('dashboard', compact('employees'));
    }
    

    // Store new employee
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:employees',
            'country' => 'required',
            'status' => 'required',
            'employee_of' => 'required',
        ]);

        // Create a new employee instance and assign data from the request
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->country = $request->country;
        $employee->status = $request->status;
        $employee->employee_of = $request->employee_of;
        $employee->comment = $request->comment;
        $employee->save();

        // Redirect back to the dashboard
        return redirect()->route('dashboard')->with('success', 'Employee added successfully.');
    }

    // Edit employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('edit', compact('employee'));
    }

    // Update employee
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'status' => 'required',
            'employee_of' => 'required',
        ]);

        // Find the employee and update the data
        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->country = $request->country;
        $employee->status = $request->status;
        $employee->employee_of = $request->employee_of;
        $employee->comment = $request->comment;
        $employee->save();

        // Redirect back to the dashboard
        return redirect()->route('dashboard')->with('success', 'Employee updated successfully.');
    }

    // Delete employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('dashboard')->with('success', 'Employee deleted successfully.');
    }
}

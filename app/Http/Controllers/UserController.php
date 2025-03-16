<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Here you can pass the data needed for the user dashboard
        return view('user.dashboard');
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'status' => 'required|string',
            'country' => 'required|string',
        ]);

        // Find the employee by ID and update the data
        $employee = Employee::findOrFail($id);
        $employee->status = $request->input('status');
        $employee->country = $request->input('country');
        $employee->save();

        // Redirect back with success message
        return redirect()->route('user.dashboard')->with('success', 'Your details have been updated!');
    }
}

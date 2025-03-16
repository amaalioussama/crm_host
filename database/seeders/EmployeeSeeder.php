<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting a lot of fake employee data
        Employee::create([
            'name' => 'John',
            'surname' => 'Doe',
            'phone' => '123-456-7890',
            'email' => 'john.doe@example.com',
            'country' => 'US',
            'status' => 'New',
            'employee_of' => 'Sales',
            'comment' => 'Excellent performance this quarter.',
        ]);

        Employee::create([
            'name' => 'Jane',
            'surname' => 'Smith',
            'phone' => '987-654-3210',
            'email' => 'jane.smith@example.com',
            'country' => 'UK',
            'status' => 'Appointment',
            'employee_of' => 'Marketing',
            'comment' => 'Scheduled for a follow-up next week.',
        ]);

        Employee::create([
            'name' => 'Michael',
            'surname' => 'Johnson',
            'phone' => '555-123-4567',
            'email' => 'michael.johnson@example.com',
            'country' => 'Canada',
            'status' => 'Call back',
            'employee_of' => 'Customer Support',
            'comment' => 'Customer requested to be called back.',
        ]);

        Employee::create([
            'name' => 'Emily',
            'surname' => 'Brown',
            'phone' => '444-789-0123',
            'email' => 'emily.brown@example.com',
            'country' => 'Australia',
            'status' => 'Voice mail',
            'employee_of' => 'HR',
            'comment' => 'Left a voice mail, awaiting response.',
        ]);

        Employee::create([
            'name' => 'David',
            'surname' => 'Williams',
            'phone' => '333-456-7891',
            'email' => 'david.williams@example.com',
            'country' => 'Germany',
            'status' => 'Trash',
            'employee_of' => 'Operations',
            'comment' => 'This lead is no longer valid.',
        ]);

        Employee::create([
            'name' => 'Sarah',
            'surname' => 'Davis',
            'phone' => '555-678-9101',
            'email' => 'sarah.davis@example.com',
            'country' => 'France',
            'status' => 'New',
            'employee_of' => 'IT',
            'comment' => 'New hire, training in progress.',
        ]);

        Employee::create([
            'name' => 'James',
            'surname' => 'Miller',
            'phone' => '987-123-4567',
            'email' => 'james.miller@example.com',
            'country' => 'Spain',
            'status' => 'Appointment',
            'employee_of' => 'Logistics',
            'comment' => 'Meeting scheduled for Monday.',
        ]);

        Employee::create([
            'name' => 'Olivia',
            'surname' => 'Taylor',
            'phone' => '222-345-6789',
            'email' => 'olivia.taylor@example.com',
            'country' => 'Italy',
            'status' => 'Voice mail',
            'employee_of' => 'Legal',
            'comment' => 'Follow-up required after voice mail.',
        ]);

        Employee::create([
            'name' => 'Liam',
            'surname' => 'Anderson',
            'phone' => '888-654-3210',
            'email' => 'liam.anderson@example.com',
            'country' => 'Ireland',
            'status' => 'Call back',
            'employee_of' => 'Finance',
            'comment' => 'Customer called, callback requested.',
        ]);

        Employee::create([
            'name' => 'Sophia',
            'surname' => 'Thomas',
            'phone' => '111-222-3333',
            'email' => 'sophia.thomas@example.com',
            'country' => 'Netherlands',
            'status' => 'Trash',
            'employee_of' => 'R&D',
            'comment' => 'This lead is inactive.',
        ]);

        // Additional data for bulk insert
        for ($i = 0; $i < 100; $i++) {
            Employee::create([
                'name' => 'Employee ' . $i,
                'surname' => 'Surname ' . $i,
                'phone' => '111-222-333' . $i,
                'email' => 'employee' . $i . '@example.com',
                'country' => 'Country ' . $i,
                'status' => $i % 2 == 0 ? 'New' : 'Appointment', // Alternating between 'New' and 'Appointment'
                'employee_of' => 'Department ' . $i,
                'comment' => 'Comment for employee ' . $i,
            ]);
        }
    }
}

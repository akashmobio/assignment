<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(5);

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function importProject()
    {
        Excel::import(new EmployeeImport, request()->file('file'));

        return back()->with('success', 'Employee created successfully.');
    }

}

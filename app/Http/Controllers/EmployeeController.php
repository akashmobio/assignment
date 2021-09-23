<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function view()
    {
        return view('employee.view');
    }
    public function index()
    {
        $employees = DB::table('employee_salaries')
            ->join('employees', 'employees.id', '=', 'employee_salaries.employee_id')
            ->join('designations', 'employees.id', '=', 'designations.employee_id')
            ->select('employees.*', 'employee_salaries.*', 'designations.*')
            ->get();

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function importProject()
    {
        $file = request()->file('file');

        $excel = Excel::import(new EmployeeImport,$file );
        // dd($excel);
        return redirect()->route('index')->with('success', 'Employee created successfully.');
    }
}

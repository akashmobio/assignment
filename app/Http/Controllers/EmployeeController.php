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
    public function index()
    {
        return view('employee.index');
    }
    public function view()
    {
        $employees = DB::table('employee_salaries')
            ->join('employees', 'employees.id', '=', 'employee_salaries.employee_id')
            ->join('designations', 'employees.id', '=', 'designations.employee_id')
            ->select('employees.*', 'employee_salaries.*', 'designations.*')
            ->get();

        return view('employee.view', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function importProject()
    {
        $file = request()->file('file');

        $employees = Excel::toArray(new EmployeeImport,$file );
        return view('employee.view',compact('employees'));
    }
    // public function importProject()
    // {
    //     $file = request()->file('file');

    //     Excel::import(new EmployeeImport,$file );
    //     return redirect()->route('employee.view')->with('success', 'Employee created successfully.');
    // }

    public function acceptEvent(){
        echo "Acccept EVent CAlled";
    }

    public function rejectEmployee(){
        return redirect()->route('employee.index')->with('error','Please Select New File');
    }
}

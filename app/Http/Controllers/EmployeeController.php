<?php

namespace App\Http\Controllers;

use App\Events\AcceptFileEvent;
use App\Imports\EmployeeImport;
use App\Listeners\AcceptListener;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Database\Eloquent\Collection;
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

        $employees = Excel::toArray(new EmployeeImport, $file);
        return view('employee.view', compact('employees'));
    }
    public function acceptEvent(Request $request)
    {
        $employee = $request->employees;
        foreach ($employee as $value) {
            $expl = explode(" ", $value);

            $emp = new Employee();
            $emp->code = $expl[0];
            $emp->name = $expl[1];
            $emp->email = $expl[2];
            $emp->gender = $expl[3];
            $emp->dob = $expl[4];
            $emp->address = $expl[6];
            $emp->phone_number = $expl[7];
            $emp->marital_status = $expl[8];
            $emp->experience = $expl[9];
            $emp->current_salary = $expl[10];
            $emp->designation = $expl[11];
            
            AcceptFileEvent::dispatch($emp);

        }
        dd($emp);
        // $emp->employeeSalary()->create([
        //     'current_salary'=> $expl[10],
        // ]);
        // $emp->designation()->create([
        //     'designation' => $expl[11]
        // ]);
        // echo "Acccept EVent CAlled";
    }

    public function rejectEmployee()
    {
        return redirect()->route('employee.index')->with('error', 'Please Select New File');
    }

    // public function importProject()
    // {
    //     $file = request()->file('file');

    //     Excel::import(new EmployeeImport,$file );
    //     return redirect()->route('employee.view')->with('success', 'Employee created successfully.');
    // }
}

<?php

namespace App\Imports;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeeImport implements ToCollection,WithHeadingRow,WithValidation
{
    use Importable;

    public function rules(): array
    {
        return [
            'code' => 'required|unique:employees',
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'marital_status' => 'required',
            'experience' => 'required|date_format:Y',
            'current_salary' => 'required|numeric',
            'designation' => 'required|alpha'
        ];
    }

    public function customValidationMessage()
    {
        return [
            'code.required' => "Employee Code must not be empty",
            'code.unique' => "Employee Code is already Used",

            'name.required' => "Employee Name must not be empty",
            
            'email.required' => "Employee Email must not be empty",
            'email.email' => "Incorrect Email Address",
            'email.unique' => "Employee Email already exist",

            'gender.required' => "Employee Gender must not be empty",
            'dob.required' => "Employee DOB must not be empty",
            'address.required' => "Employee Address must not be empty",
            
            'phone_number.required' => "Employee Phonenumber must not be empty",
            'phone_number.regex' => "Incorrect Format Employee number",

            'marital_status.required' => "Employee MaritalStatus must not be empty",
            'experience.required' => "Employee Experience must not be empty",
            'current_salary.required' => "Employee Current Salary must not be empty",
            'designation.required' => "Employee Designation must not be empty",

        ];
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $emp = Employee::create([
                'code'      => $row['code'],
                'name'      => $row['name'],
                'email'     => $row['email'],
                'gender'    => $row['gender'],
                'dob'       => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob']),
                'address'    => $row['address'],
                'phone_number'    => $row['phone_number'],
                'marital_status'    => $row['marital_status'],
                'experience'    => $row['experience'],
            ]);
            
            $emp_salary = EmployeeSalary::create([
                'current_salary' =>$row['current_salary'],
                'employee_id' => $emp->id,
            ]);

            $emp_salary = Designation::create([
                'designation' =>$row['designation'],
                'employee_id' => $emp->id,
            ]);
        }
    }
}

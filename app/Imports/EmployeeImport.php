<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow, ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // $d = $row['dob'];
        // $miliseconds = ($d - (25567 + 2)) * 86400 * 1000;
        // $seconds = $miliseconds / 1000;
        // dd(date("Y-m-d", $seconds));
        // dd($row);
        // return new Employee([
        //     'code'      => $row['code'],
        //     'name'      => $row['name'],
        //     'email'     => $row['email'],
        //     'gender'    => $row['gender'],
        //     'dob'       => $row['dob'],
        //     'address'    => $row['address'],
        //     'phone_number'    => $row['phone_number'],
        //     'marital_status'    => $row['marital_status'],
        //     'experience'    => $row['experience'],
        // ]);
    }
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // $d = $row['dob'];
            // $miliseconds = ($d - (25567 + 2)) * 86400 * 1000;
            // $seconds = $miliseconds / 1000;
            // $date= date("Y-m-d", $seconds);
            $emp = Employee::create([
                'code'      => $row['code'],
                'name'      => $row['name'],
                'email'     => $row['email'],
                'gender'    => $row['gender'],
                'dob'       => $row['dob'],
                'address'    => $row['address'],
                'phone_number'    => $row['phone_number'],
                'marital_status'    => $row['marital_status'],
                'experience'    => $row['experience'],
            ]);
            echo ($emp);
        }
    }
}

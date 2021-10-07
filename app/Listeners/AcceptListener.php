<?php

namespace App\Listeners;

use App\Events\AcceptFileEvent;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AcceptListener //implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AcceptFileEvent  $event
     * @return void
     */
    public function handle(AcceptFileEvent $event)
    {
        $name = $event->employee->name;
        echo $name;
        // $employee = Employee::create([
        //     'code'      => $emp['code'],
        //     'name'      => $emp['name'],
        //     'email'     => $emp['email'],
        //     'gender'    => $emp['gender'],
        //     'dob'       => transformDate($emp['dob']),
        //     'address'    => $emp['address'],
        //     'phone_number'    => $emp['phone_number'],
        //     'marital_status'    => $emp['marital_status'],
        //     'experience'    => $emp['experience'],
        // ]);
        // $employee->employeeSalary()->create([
        //     'current_salary' => $emp['current_salary'],
        // ]);
        // $employee->designation()->create([
        //     'designation' => $emp['designation']
        // ]);

        // return $employee;
    }
}

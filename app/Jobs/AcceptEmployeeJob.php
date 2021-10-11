<?php

namespace App\Jobs;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AcceptEmployeeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emp;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Employee $emp)
    {
        $this->emp = $emp;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd("Employee Job Called");
        $employee = Employee::create([
            'code'      => $this->emp['code'],
            'name'      => $this->emp['name'],
            'email'     => $this->emp['email'],
            'gender'    => $this->emp['gender'],
            'dob'       => $this->emp['dob'],
            'address'    => $this->emp['address'],
            'phone_number'    => $this->emp['phone_number'],
            'marital_status'    => $this->emp['marital_status'],
            'experience'    => $this->emp['experience'],
        ]);
        $employee->employeeSalary()->create([
            'current_salary' => $this->emp['current_salary'],
        ]);
        $employee->designation()->create([
            'designation' => $this->emp['designation']
        ]);
        return $employee;
    }
}

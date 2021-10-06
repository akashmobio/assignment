<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = true;

    protected $fillable = [
        'code',
        'name', 
        'email', 
        'gender', 
        'dob', 
        'address',
        'phone_number',
        'marital_status',
        'experience'
    ];

    public function employeeSalary(){
        return $this->hasOne(EmployeeSalary::class);
    }

    public function designation(){
        return $this->hasOne(Designation::class);
    }
}

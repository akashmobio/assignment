<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;
    protected $table = 'employee_salaries';
    public $timestamps = true;

    protected $fillable = [
        'current_salary',
        'employee_id',
    ];
}

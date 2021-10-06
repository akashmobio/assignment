<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;


    protected $table = 'designations';
    public $timestamps = true;

    protected $fillable = [
        'designation',
        'employee_id'
    ];
    
    // public function employee(){
    //     return $this->hasOne(Employee::class);
    // }
}

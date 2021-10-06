<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('employee/view',[EmployeeController::class,'view'])->name('employee.view');
Route::post('employee/importProject', [EmployeeController::class, 'importProject'])->name('employee.importProject');
Route::get('acceptEvent',[EmployeeController::class,'acceptEvent'])->name('employee.acceptEvent');
Route::get('reject',[EmployeeController::class,'rejectEmployee'])->name('employee.rejectEmployee');
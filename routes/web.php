<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});
// returns the home page with all employees
Route::get('/employees', EmployeeController::class .'@index')->name('employees.index');

// returns the form for adding a employee
Route::get('/employees/create', EmployeeController::class . '@create')->name('employees.create');

// adds a employee to the database
Route::post('/employees', EmployeeController::class .'@store')->name('employees.store');

// returns a page that shows a full employee
Route::get('/employees/{employees}', EmployeeController::class .'@show')->name('employees.show');

// returns the form for editing a employee
Route::get('/employees/{employees}/edit', EmployeeController::class .'@edit')->name('employees.edit');

// updates a employee
Route::put('/employees/{employees}', EmployeeController::class .'@update')->name('employees.update');

// deletes a employee
Route::delete('/employees/{employees}', EmployeeController::class .'@destroy')->name('employees.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

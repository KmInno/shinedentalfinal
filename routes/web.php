<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReceiptController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('patients', PatientController::class);
    Route::resource('procedures', ProcedureController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('receipts', ReceiptController::class);
});

// Route::get('/getProcedurePrice/{procedure}', 'ProcedureController@getProcedurePrice')->name('getProcedurePrice');
Route::get('/procedures/form', [ProcedureController::class, 'showForm'])->name('procedures.form');



// Route::resource('procedures', ProcedureController::class);
// Route::resource('departments', DepartmentController::class);
// Route::resource('employees', EmployeeController::class);
// Route::resource('appointments', AppointmentController::class);
// Route::resource('receipts', ReceiptController::class);

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminSuprivisorController;

// -------------------------------- Log in and Registration -------------------------------------------------------
// Login
Route::get('/login', function(){ return view('Authentication/Login');});
Route::post('/login', [AuthenticationController::class, 'login']);

// Logout
Route::get('/logout', [AuthenticationController::class, 'logout']);
// Register
Route::get('/register', function(){ return view('Authentication/Register');});
Route::post('/register', [AuthenticationController::class, 'register']);


//--------------------------------- Routing to sub home pages -----------------------------------------------------
Route::get('/home', [HomeController::class, 'reroute'])->middleware('auth:*');


//----------------------------------------- Admin -----------------------------------------------------------------
Route::middleware(['auth:1'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home']);
    Route::get('/admin/report', [AdminController::class, 'report']);
    Route::get('/admin/payment', [AdminController::class, 'payment']);
    Route::get('/admin/approval', [AdminController::class, 'approval']);
    Route::get('/admin/createrole', [AdminController::class, 'createrolepage']);
    Route::post('/admin/createrole', [AdminController::class, 'createrole']);
});

// -------------------------------------------- Doctor ---------------------------------------------------
Route::middleware(['auth:3'])->group(function () {
    Route::get('/doctor/home', [DoctorController::class, 'home']);
    Route::get('/doctor/getOldAppointments', [DoctorController::class, 'getOldAppointments']);
    Route::get('/doctor/getNewAppointments/{date}', [DoctorController::class, 'getNewAppointments']);
    Route::get('/doctor/patientpage/{id}', [DoctorController::class, 'patient']);
    Route::post('/doctor/patientpage/{id}', [DoctorController::class, 'createPerscription']);
});

// -------------------------------------------- Admin/Suprivisor ---------------------------------------------------
Route::middleware(['auth:1,2'])->group(function () {
    Route::get('/supervisor/createAppointment', [AdminSuprivisorController::class, 'createAppointmentHome']);
    Route::get('/supervisor/searchForName/{id}', [AdminSuprivisorController::class, 'searchForName']);
    Route::get('/supervisor/searchRoster/{date}', [AdminSuprivisorController::class, 'searchRoster']);
    Route::post('/supervisor/createAppointment', [AdminSuprivisorController::class, 'createAppointment']);

    Route::get('/supervisor/createRoster', [AdminSuprivisorController::class, 'createRosterHome']);
    Route::post('/supervisor/createRoster', [AdminSuprivisorController::class, 'createRoster']);
    Route::get('/supervisor/updateRosterChoices', [AdminSuprivisorController::class, 'updateRosterChoices']);

    Route::get('/supervisor/createAdditionalPatientInfo', [AdminSuprivisorController::class, 'createAdditionalPatientInfoHome']);
    Route::post('/supervisor/createAdditionalPatientInfo', [AdminSuprivisorController::class, 'createAdditionalPatientInfo']);
});
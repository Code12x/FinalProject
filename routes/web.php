<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FamilyController;
use App\Models\Patient;
use App\Models\PatientCareLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// ----------------------------------- Advance Date ---------------------------------------------------------
Route::post('/update-date', function(Request $request) {
    $date = $request->input('date');
    DB::table('tblKeyValues')->where('key', 'currDate')->update(['value' => $date]);
    $newDate = DB::table('tblKeyValues')->where('key', 'currDate')->get()[0]->value;

    // New date has to create a new patient care log for every day
    $patients = Patient::all();
    foreach ($patients as $patient) {
        $patientCareLog = PatientCareLog::make();
        $patientCareLog->intPatientId = $patient->intPatientId;
        $patientCareLog->dteLogDate = $newDate;
        $patientCareLog->save();
    }
    
    return ['success'];
});

// -------------------------------- Log in and Registration -------------------------------------------------------
// Login
Route::get('/login', function(){ return view('Authentication/Login');});
Route::post('/login', [AuthenticationController::class, 'login']);

// Logout
Route::get('/logout', [AuthenticationController::class, 'logout']);
// Register
Route::get('/register', [AuthenticationController::class, 'getRegister']);
Route::post('/register', [AuthenticationController::class, 'register']);


//--------------------------------- Routing to sub home pages -----------------------------------------------------
Route::get('/home', [HomeController::class, 'reroute'])->middleware('auth:*');


//----------------------------------------- Admin -----------------------------------------------------------------
Route::middleware(['auth:1'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home']);
    Route::get('/admin/report', [AdminController::class, 'report']);
    //Route::get('/admin/report', function() { return view('woops'); });
    Route::get('/admin/payment', [AdminController::class, 'payment']);
    Route::get('/admin/approval', [AdminController::class, 'approval']);
    Route::post('/admin/approve', [AdminController::class, '_approve']);
    Route::post('/admin/_payment', [AdminController::class, '_payment']);
    Route::post('/admin/_user-payment', [AdminController::class, '_totalDue']);
    Route::get('/admin/createrole', [AdminController::class, 'createrolepage']);
    Route::post('/admin/createrole', [AdminController::class, 'createrole']);
});

////* Admin */
Route::get('/admin/home', [AdminController::class, 'home']);
Route::get('/admin/report', [AdminController::class, 'report']);
Route::get('/admin/payment', [AdminController::class, 'payment']);
Route::get('/admin/approval', [AdminController::class, 'approval']);

////* family home page view */
Route::get('family/home', function () {
    return view('family/home');
});
Route::get('family/getPatientInfo', [FamilyController::class, 'getPatientInfo']);
Route::get('family/getDoctorInfo', [FamilyController::class, 'getDoctorInfo']);

//data example
Route::get('family/home', [FamilyController::class, 'example']);

////* Log in and Registration */
Route::get('Authentication/login', function(){
    return view('Authentication\Login');
});

// -------------------------------------------- Doctor ---------------------------------------------------
Route::middleware(['auth:3'])->group(function() {
    Route::get('/doctor/home', [DoctorController::class, 'home']);
    Route::get('/doctor/getOldAppointments', [DoctorController::class, 'getOldAppointments']);
    Route::get('/doctor/getNewAppointments/{date}', [DoctorController::class, 'getNewAppointments']);
    Route::get('/doctor/patientpage/{id}', [DoctorController::class, 'patient']);
    Route::post('/doctor/patientpage/{id}', [DoctorController::class, 'createPerscription']);
});
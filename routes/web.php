<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CareGiverController;
use App\Models\Patient;
use App\Models\PatientCareLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminSuprivisorController;

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

Route::get('/', function() {
    return view('/shared/homepage');
});

//----------------------------------------- Admin -----------------------------------------------------------------
Route::middleware(['auth:1'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home']);
    Route::get('/admin/report', [AdminController::class, 'report']);
    Route::get('/admin/payment', [AdminController::class, 'payment']);
    Route::get('/admin/approval', [AdminController::class, 'approval']);
    Route::post('/admin/approve', [AdminController::class, '_approve']);
    Route::post('/admin/_payment', [AdminController::class, '_payment']);
    Route::post('/admin/_user-payment', [AdminController::class, '_totalDue']);
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
    Route::get('/supervisor/home', [AdminSuprivisorController::class, 'suprivisorHome']);

    Route::get('/supervisor/createAppointment', [AdminSuprivisorController::class, 'createAppointmentHome']);
    Route::get('/supervisor/searchForName/{id}', [AdminSuprivisorController::class, 'searchForName']);
    Route::get('/supervisor/searchRoster/{date}', [AdminSuprivisorController::class, 'searchRoster']);
    Route::post('/supervisor/createAppointment', [AdminSuprivisorController::class, 'createAppointment']);

    Route::get('/supervisor/createRoster', [AdminSuprivisorController::class, 'createRosterHome']);
    Route::post('/supervisor/createRoster', [AdminSuprivisorController::class, 'createRoster']);
    Route::get('/supervisor/updateRosterChoices', [AdminSuprivisorController::class, 'updateRosterChoices']);

    Route::get('/supervisor/createAdditionalPatientInfo', [AdminSuprivisorController::class, 'createAdditionalPatientInfoHome']);
    Route::post('/supervisor/createAdditionalPatientInfo', [AdminSuprivisorController::class, 'createAdditionalPatientInfo']);

    Route::get('/supervisor/displayEmployees', [AdminSuprivisorController::class, 'displayEmployeesHome']);
    Route::get('/supervisor/getEmployees', [AdminSuprivisorController::class, 'getEmployees']);
    Route::post('/supervisor/updateSalary', [AdminSuprivisorController::class, 'updateSalary']);
});

// ----------------------------------------------- Patient ---------------------------------------------------
Route::middleware(['auth:5'])->group(function() {
    Route::get('/patient/home', [PatientController::class, 'home']);
});

// -----------------------------------------family home page view -------------------------------------------
Route::middleware(['auth:6'])->group(function() {
    Route::get('family/familyHome', [FamilyController::class, 'familyHome']);
    Route::get('family/getPatientInfo', [FamilyController::class, 'getPatientInfo']);
    Route::get('family/getDoctorInfo', [FamilyController::class, 'getDoctorInfo']);
    Route::get('family/getRosterInfo', [FamilyController::class, 'getRosterInfo']);
});

// ------------------------------------------- Shared ------------------------------------------------------
// patients page
Route::middleware(['auth:1,2,3,4'])->group(function() {
    Route::get("/patients", [HomeController::class, 'patients']);
    Route::get("/patients/search", [HomeController::class, 'patientsSearch']);
});

// view roster
Route::middleware(['auth:*'])->group(function() {
    Route::get('/roster/viewRoster', [HomeController::class, 'viewRoster']);
    Route::get('/roster/viewRosterInfo', [HomeController::class, 'viewRosterInfo']);
});

// -------------------------------------------- Caregiver ---------------------------------------------------
Route::middleware(['auth:4'])->group(function() {
    Route::get('caregiver/home', [CareGiverController::class, 'caregiverHome']);
    Route::get('caregiver/getPatients', [CareGiverController::class, 'getPatients']);
    Route::post('caregiver/updatePatient', [CareGiverController::class, 'updatePatient']);
});
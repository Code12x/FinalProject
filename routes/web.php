<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;

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
});


////* Admin */
Route::get('/admin/home', [AdminController::class, 'home']);
Route::get('/admin/report', [AdminController::class, 'report']);
Route::get('/admin/payment', [AdminController::class, 'payment']);
Route::get('/admin/approval', [AdminController::class, 'approval']);

// Log in and Registration 
Route::get('Authentication/login', function(){
    return view('Authentication\Login');
});

Route::get('Authentication/register', function(){
    return view('Authentication\Register');
});

Route::post('Authentication/register', [AuthenticationController::class, 'register']);


//Caregiver
route::get('/caregivers_home', function () {
    return view('shared/caregivers_home');
});

//Home
route::get('/', function () {
    return view('shared/home');
});
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;

// Log in and Registration -----------------------------------------------------------------------------------------
// Login
Route::get('Authentication/login', function(){ return view('Authentication/Login');});
Route::post('Authentication/login', [AuthenticationController::class, 'login']);

// Logout
Route::get('Authentication/logout', [AuthenticationController::class, 'logout']);
// Register
Route::get('Authentication/register', function(){ return view('Authentication/Register');});
Route::post('Authentication/register', [AuthenticationController::class, 'register']);
// ----------------------------------------------------------------------------------------

// Routing to sub home pages -----------------------------------------------------------------------------------------
// Route::middleware(['auth:'])->group(function () {
    Route::get('/home', [HomeController::class, 'reroute']);
// });
// -----------------------------------------------------------------------------------------

////* Admin */
Route::middleware(['auth:1'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home']);
    Route::get('/admin/report', [AdminController::class, 'report']);
    Route::get('/admin/payment', [AdminController::class, 'payment']);
    Route::get('/admin/approval', [AdminController::class, 'approval']);
});

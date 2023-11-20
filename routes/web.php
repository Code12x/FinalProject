<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

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
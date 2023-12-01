<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FamilyController;

////* Admin */
Route::get('/admin/home', [AdminController::class, 'home']);
Route::get('/admin/report', [AdminController::class, 'report']);
Route::get('/admin/payment', [AdminController::class, 'payment']);
Route::get('/admin/approval', [AdminController::class, 'approval']);

////* family home page view */
Route::get('family/home', function () {
    return view('family/home');
});
Route::get('family/getInfo', [FamilyController::class, 'getInfo']);


//data example
Route::get('family/home', [FamilyController::class, 'example']);

////* Log in and Registration */
Route::get('Authentication/login', function(){
    return view('Authentication\Login');
});

Route::get('Authentication/register', function(){
    return view('Authentication\Register');
});

Route::post('Authentication/register', [AuthenticationController::class, 'register']);
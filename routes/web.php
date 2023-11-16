<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});

// Log in and Registration 
Route::get('Authentication/login', function(){
    return view('Authentication\Login');
});

Route::get('Authentication/register', function(){
    return view('Authentication\Register');
});

Route::post('Authentication/register', [AuthenticationController::class, 'register']);
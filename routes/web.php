<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});

// Log in and Registration 
Route::get('Authentication/Login', function(){
    return view('Authentication\Login');
});

Route::get('Authentication/Register', function(){
    return view('Authentication\Register');
});
<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

////* Admin */
Route::middleware(['auth:1'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home']);
    Route::get('/admin/report', [AdminController::class, 'report']);
    Route::get('/admin/payment', [AdminController::class, 'payment']);
    Route::get('/admin/approval', [AdminController::class, 'approval']);
});

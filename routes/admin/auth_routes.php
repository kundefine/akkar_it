<?php

use App\Http\Controllers\AuthAdmin\LoginController;
use App\Http\Controllers\AuthAdmin\RegistrationController;
use App\Http\Controllers\Users\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


// admin login registration
Route::group([
    "prefix" => "systemx"
], function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('register', [RegistrationController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('register', [RegistrationController::class, 'register'])->name('admin.register.submit');
});



// admin dashboard
Route::group([
    "prefix" => "systemx",
    "middleware" => "auth:admin"
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});




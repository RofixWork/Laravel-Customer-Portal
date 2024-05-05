<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function() {
    Route::controller(CustomerController::class)->prefix('/customers')->name('customers.')->group(function() {
        Route::match(['get', 'post'], '/', 'index')->name("index");
        Route::post('/create', 'store')->name('store');
        Route::patch('/update/{customer}', 'update');
        Route::delete("/delete/{customer}", 'destroy');

    });

    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

});

Route::middleware('guest')->group(function () {
    Route::controller(UserController::class)->prefix('user/')->name('user.')->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
    });

    Route::controller(AuthController::class)->prefix('auth/')->name('auth.')->group(function () {
        Route::post('/register', 'store')->name('store');
        Route::post('/login', 'authenticate')->name('authenticate');
    });
});





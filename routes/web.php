<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserRegisterController;
use Barryvdh\Debugbar\DataCollector\SessionCollector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {

        $user = Auth::user();

        return view('pages/dashboard', ['user' => $user]);
    })->name('/');

    Route::get('/ndrlist', function () {

        return view('pages/ndrList', ['user' =>  Auth::user()]);
    })->name('/ndr.list');

    Route::get('/register', [UserRegisterController::class, 'create']);
    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

    Route::POST('/register', [UserRegisterController::class, 'store'])->name('register.store');
});


Route::get('/login', [SessionController::class, 'show'])->name('login');

Route::POST('/login', [SessionController::class, 'perform'])->name('login.perform');

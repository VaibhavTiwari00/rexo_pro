<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\NdrImportController;
use App\Models\ndr_importing_log;
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
    })->name('ndr.list');

    Route::get('/ndrimport', function () {
        return view('pages/ndrImport', ['user' =>  Auth::user()]);
    })->name('ndr.import');

    Route::post('/import-ndr', [NdrImportController::class, 'importNdr'])->name('ndr.importdata');


    Route::get('/register', [UserRegisterController::class, 'create']);
    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

    Route::POST('/register', [UserRegisterController::class, 'store'])->name('register.store');
});


Route::get('/login', [SessionController::class, 'show'])->name('login');

Route::POST('/login', [SessionController::class, 'perform'])->name('login.perform');

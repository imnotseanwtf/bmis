<?php

use App\Http\Controllers\BlotterRecordController;
use App\Http\Controllers\DocumentAction\AcceptRequestDocumentController;
use App\Http\Controllers\DocumentAction\RejectRequestDocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\RequestDocumentController;
use App\Http\Controllers\ResidentAction\AcceptResidentController;
use App\Http\Controllers\ResidentAction\RejectResidentController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // RESOURCES
    Route::resources(
        [
            'request-document' => RequestDocumentController::class,
        ]
    );

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        // RESOURCES
        Route::resources([
            'resident' => ResidentController::class,
            'blotter' => BlotterRecordController::class
        ]);
        // DOCUMENT ACTION
        Route::put('accept-document/{requestDocument}', AcceptRequestDocumentController::class)->name('accept-document');
        Route::put('reject-document/{requestDocument}', RejectRequestDocumentController::class)->name('reject-document');

        // RESIDENT ACTION
        Route::put('accept/{resident}', AcceptResidentController::class)->name('accept');
        Route::put('reject/{resident}', RejectResidentController::class)->name('reject');

        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    });


    Route::view('about', 'about')->name('about');


    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

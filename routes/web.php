<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeniorCitizenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('senior-citizen', SeniorCitizenController::class)->middleware('auth');
Route::get('/senior-citizen/qr-profile/{seniorCitizen}', [SeniorCitizenController::class, 'showQrProfile'])
    ->name('senior-citizen.qr-profile');

require __DIR__ . '/auth.php';

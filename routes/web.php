<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ConnectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/study', [ProfileController::class, 'editStudyProfile'])->name('profile.study.edit');
    Route::patch('/profile/study', [ProfileController::class, 'updateStudyProfile'])->name('profile.study.update');
    Route::delete('/profile/study', [ProfileController::class, 'destroyStudyProfile'])->name('profile.study.destroy');
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('/partner/{studyProfile}', [PartnerController::class, 'show'])->name('partners.show');
    Route::post('/connections/{user}', [ConnectionController::class, 'store'])->name('connections.store');
    Route::delete('/connections/{user}', [ConnectionController::class, 'destroy'])->name('connections.destroy');

});

require __DIR__.'/auth.php';

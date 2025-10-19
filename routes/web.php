<?php

use App\Http\Controllers\ProfileController;
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
});

Route::get('/partners', function () {

    $dummyPartners = [
        [
            'id' => 1,
            'name' => 'Jane Doe',
            'major' => 'Physics',
        ],
        [
            'id' => 2,
            'name' => 'Alice Smith',
            'major' => 'Information Systems',
        ],
        [
            'id' => 3,
            'name' => 'Fuad Shinjuku',
            'major' => 'International Relations',
        ]
    ];

    return view('partners.index', ['partners' => $dummyPartners]);
})->name('partners');

Route::get('/partner/{id}', function ($id) {

    $partners = [
        ['id' => 1, 'name' => 'Jane Doe', 'city' => 'Surabaya', 'major' => 'Physics', 'interest' => 'Explosives Engineering'],
        ['id' => 2, 'name' => 'Alice Smith', 'city' => 'Bandung', 'major' => 'Information Systems', 'interest' => 'Cybersecurity'],
        ['id' => 3, 'name' => 'Fuad Shinjuku', 'city' => 'Tokyo', 'major' => 'International Relations', 'interest' => 'Diplomacy'],
    ];

    return view('partners.show', ['id' => $id]);
})->name('partners.show');

require __DIR__.'/auth.php';

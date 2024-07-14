<?php

use App\Http\Controllers\{
    ProfileController,
    DashboardController,
    ContributionController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/contributions', [ContributionController::class, 'index'])->name('contribution.index');
    Route::get('/contributions/create', [ContributionController::class, 'create'])->name('contribution.create');
    Route::post('/contributions/store', [ContributionController::class, 'store'])->name('contribution.store');
    Route::get('/contribution/{id}', [ContributionController::class, 'show'])->name('contribution.show');
    Route::put('/contribution/update/{id}', [ContributionController::class, 'update'])->name('contribution.update');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/assign/{id}', [UserController::class, 'assign'])->name('users.assign');








    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

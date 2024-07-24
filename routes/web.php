<?php

use App\Http\Controllers\{
    ProfileController,
    DashboardController,
    ContributionController,
    PaymentController,
    ReminderController,
    ReportController,
    SettingController,
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
    Route::put('/payment/update', [ContributionController::class, 'update_pay'])->name('payment.update');
    Route::get('/contribution/{id}/reminders', [ContributionController::class, 'settings'])->name('contribution.settings');


    Route::post('/InitiatePayment', [PaymentController::class, 'paymentGateway'])->name('payment.pay');
    Route::get('/contribution/{id}/receipts', [PaymentController::class, 'receipt'])->name('payment.receipt');
    


    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/assign/{id}', [UserController::class, 'assign'])->name('users.assign');
    Route::post('/users/role', [UserController::class, 'role'])->name('users.role');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/assignrole', [UserController::class, 'assign_role'])->name('users.assign_role');


    Route::post('/reminder/store', [ReminderController::class, 'store'])->name('reminder.store');
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

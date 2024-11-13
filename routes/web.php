<?php

use App\Http\Controllers\ApprovalsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/reservations/dashboard', [DashboardController::class, 'dashboard'])->name('reservations.dashboard');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/reservations/export-reservations', [ReportController::class, 'export'])->name('reservations.export');
// });

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/export-reservations', [ReportController::class, 'export'])->name('reservations.export');
    Route::get('/reservations/dashboard', [DashboardController::class, 'dashboard'])->name('reservations.dashboard');
});

Route::group(['middleware' => ['role:level1,level2']], function () {
    Route::get('/approvals', [ApprovalsController::class, 'index'])->name('approvals.index');
    Route::post('/approvals/{id}/approve/level1', [ApprovalsController::class, 'approveLevel1'])->name('approvals.approve.level1');
    Route::post('/approvals/{id}/reject/level1', [ApprovalsController::class, 'rejectLevel1'])->name('approvals.reject.level1');
    Route::post('/approvals/{id}/approve/level2', [ApprovalsController::class, 'approveLevel2'])->name('approvals.approve.level2');
    Route::post('/approvals/{id}/reject/level2', [ApprovalsController::class, 'rejectLevel2'])->name('approvals.reject.level2');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

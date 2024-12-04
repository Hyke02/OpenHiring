<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacaturesController;
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

Route::get('/invitation', [InvitationController::class, 'index'])->name('invitation.index');
Route::POST('/invitation', [InvitationController::class, 'store'])->name('invitation.store');


require __DIR__.'/auth.php';

// Routes voor Vacatures
Route::get('/vacatures', [VacaturesController::class, 'index'])->name('vacatures.index');
Route::middleware('auth')->group(function () {
    Route::get('/vacatures/create', [VacaturesController::class, 'create'])->name('vacatures.create');
    Route::post('/vacatures', [VacaturesController::class, 'store'])->name('vacatures.store');
    Route::get('/vacatures/{id}/edit', [VacaturesController::class, 'edit'])->name('vacatures.edit');
    Route::put('/vacatures/{id}', [VacaturesController::class, 'update'])->name('vacatures.update');
    Route::delete('/vacatures/{id}', [VacaturesController::class, 'destroy'])->name('vacatures.destroy');
});
Route::get('/vacatures/{id}', [VacaturesController::class, 'show'])->name('vacatures.show');


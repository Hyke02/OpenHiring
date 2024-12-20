<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\MyVacancyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\ValidateAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function(){ return view('homepage');})->name('home');

Route::middleware(['auth', ValidateAdmin::class])->group(function(){
    Route::get('/employer/index', [EmployerController::class, 'showJobListing'])->name('employer.index');
    Route::get('/employer/show/{vacancy}', [EmployerController::class, 'showJobDetails'])->name('employer.job.show');
    Route::post('/employer/show/{vacancy}/invite', [invitationController::class, 'sendInvitations'])->name('employer.job.invite');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/invitation/{id}', [InvitationController::class, 'showInvitation'])->name('invitation.show');
Route::get('/invitation', [InvitationController::class, 'index'])->name('invitation.index');
Route::post('/invitation/{invitation}/store', [InvitationController::class, 'store'])->name('invitation.store');
Route::delete('/invitation{id}', [InvitationController::class, 'destroy'])->name('invitation.destroy');


require __DIR__.'/auth.php';

//Route voor logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Routes voor Vacatures
Route::get('/vacancy', [VacancyController::class, 'index'])->name('vacancy.index');
Route::middleware('auth')->group(function () {
    Route::get('/vacancy/create', [VacancyController::class, 'create'])->name('vacancy.create')->middleware(ValidateAdmin::class);
    Route::post('/vacancy', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('/vacancy/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::put('/vacancy/{id}', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::delete('/vacancy/{id}', [VacancyController::class, 'destroy'])->name('vacancy.destroy');
});
Route::get('/vacancy/{id}', [VacancyController::class, 'show'])->name('vacancy.show');
Route::post('/vacancy/{vacancy}/store', [VacancyController::class, 'storeUser_id'])->name('vacancy.storeUser_id');

// Route voor mijn vacatures
Route::get('/my-vacancy', [MyVacancyController::class, 'index'])->name('my-vacancy.index');

<?php

use App\Http\Controllers\AddGroundController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\ShowMapController;
use App\Http\Controllers\ProfileController;
use App\Models\GroundDetails;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Commands\Show;

Route::get('/login', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:superAdmin|admin|guest'])
    ->name('dashboard');

Route::get('/ViewPeta', [ShowMapController::class, 'showMap'])->middleware(['auth', 'verified', 'role:guest|superAdmin|admin'])->name('ViewPeta');

Route::get('/ManageGround', [GroundController::class, 'showData'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('ManageGround');

Route::delete('/ManageGround/{id}', [GroundController::class, 'destroy'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('GroundDestroy');

Route::get('/AddGround', [GroundController::class, 'create'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('AddGround');

Route::post('/SaveGround', [GroundController::class, 'store'])->name('SaveGround');

Route::get('/EditPeta/{id}', [GroundController::class, 'edit'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('EditPeta');

Route::put('/UpdatePeta/{id}', [GroundController::class, 'update'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('UpdatePeta');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified', 'role:superAdmin'])->name('admin.dashboard');

Route::get('/restore-data', function () {
    return view('RestoreData');
})->name('data.restore');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AddGroundController;
use App\Http\Controllers\ShowMapController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:superAdmin|admin|guest'])->name('dashboard');

Route::get('/ViewPeta', [ShowMapController::class, 'showMap'])->middleware(['auth', 'verified', 'role:guest|superAdmin|admin'])->name('ViewPeta');

Route::get('/ManageGround', function(){
    return view('ManageGround');
})->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('ManageGround');

Route::get('/AddGround', function () {
    return view('AddGround');
})->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('AddGround');

Route::post('/save-ground', [AddGroundController::class, 'saveGround'])->name('save.ground');

require __DIR__.'/auth.php';

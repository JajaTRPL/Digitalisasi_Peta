<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:superAdmin|admin|guest'])->name('dashboard');

Route::get('/ViewPeta', function () {
    return view('ViewPeta');
})->middleware(['auth', 'verified', 'role:guest|superAdmin|admin'])->name('ViewPeta');

Route::get('/ManageGround', function () {
    return view('ManageGround');
})->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('ManageGround');

Route::get('/AddGround', function () {
    return view('AddGround');
})->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('AddGround');

require __DIR__.'/auth.php';

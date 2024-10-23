<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function(){
    return view('dashboardAdmin');
})->middleware(['auth', 'verified', 'role:admin']);


Route::get('superadmin', function(){
    return view('dashboardSuperAdmin');
})->middleware(['auth', 'verified', 'role:superAdmin']);

Route::get('/ViewPetaAdmin', function () {
    return view('ViewPetaAdmin');
});

Route::get('/ManageGround', function () {
    return view('ManageGround');
});

Route::get('/AddGround', function () {
    return view('AddGround');
});

require __DIR__.'/auth.php';

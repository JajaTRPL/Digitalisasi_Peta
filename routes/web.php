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

Route::get('/', function () {
    return view('test');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/ViewPeta', function() {
    return view('ViewPeta');
})->name('ViewPeta');

Route::get('/ManageGround', function(){
    return view('ManageGround');
})->name('ManageGround');

Route::delete('/ManageGround/{id}', [GroundController::class, 'destroy'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('GroundDestroy');

Route::get('/AddGround', [GroundController::class, 'create'])->name('AddGround');

Route::post('/SaveGround', [GroundController::class, 'store'])->name('SaveGround');

Route::get('/EditGround/{id}', function($id){
    return view('EditGround', ['id' => $id]);
})->name('EditGround');


// Route::put('/UpdatePeta/{id}', [GroundController::class, 'update'])->name('UpdatePeta');

Route::get('/admin', function () {
    return view('manageAdmin');
})->name('manageAdmin');

Route::get('/restore-data', function () {
    return view('RestoreData');
})->name('data.restore');


Route::get('/lupa-password', function () {
    return view('auth.reset-password'); // Sesuaikan dengan nama blade Anda
})->name('password.request');

require __DIR__.'/auth.php';

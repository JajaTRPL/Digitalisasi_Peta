<?php

use App\Http\Controllers\AddGroundController;
use App\Http\Controllers\GroundDetailsController;
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

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:superAdmin|admin|guest'])->name('dashboard');

Route::get('/ViewPeta', [ShowMapController::class, 'showMap'])->middleware(['auth', 'verified', 'role:guest|superAdmin|admin'])->name('ViewPeta');

Route::get('/ManageGround', [GroundDetailsController::class, 'showData'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('ManageGround');
// Route::delete('/books/{id}', action: [GroundDetailsController::class, 'destroy'])->name('books.destroy');
Route::delete('/ManageGround/{id}', [GroundDetailsController::class, 'destroy'])->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('GroundDestroy');
Route::get('/AddGround', function () {
    return view('AddGround');
})->middleware(['auth', 'verified', 'role:superAdmin|admin'])->name('AddGround');

Route::post('/save-ground', [AddGroundController::class, 'saveGround'])->name('save.ground');

// Route untuk menampilkan halaman Edit Peta
Route::get('/edit-peta/{id}', [MapController::class, 'edit'])->name('editPeta');

// Route untuk mengupdate data peta
Route::post('/update-peta/{id}', [MapController::class, 'update'])->name('updatePeta');

require __DIR__.'/auth.php';

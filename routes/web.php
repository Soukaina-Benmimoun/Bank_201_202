<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VirementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard', function () {
    return view('admin_dashboard');
})->middleware(['auth', 'verified','check_admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/virements', [VirementController::class, 'index'])->name('virements.index');
    Route::get('/virements/create', [VirementController::class, 'create'])->name('virements.create');
    Route::post('/virements', [VirementController::class, 'store'])->name('virements.store');

    
    Route::get('/retrait/create', [VirementController::class, 'createRetait'])->name('retrait.create');
    Route::post('/retrait', [VirementController::class,'storeRetait'])->name('retrait.store');
    
});
Route::middleware(['auth','check_admin'])->group(function() {

    Route::get('/all_users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AdminController;
use App\Http\Requests\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RedirectController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth'])->get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard'); // User dashboard route
// Route::middleware(['auth'])->get('/dashboard', [AdminController::class, 'index'])->name('dashboard'); // Admin dashboard route

// // Redirect based on session
// Route::middleware(['auth'])->get('/redirect', function () {
//     return redirect(session('redirect_to', '/'));  // Default redirect if no session
// })->name('redirect');
// // Route for the dashboard to view employees
// Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

// // Store, Edit, Update, Delete routes for employees
// Route::post('/admin/store', [AdminController::class, 'store'])->name('employee.store');
// Route::get('/employee/{id}/edit', [AdminController::class, 'edit'])->name('employee.edit');
// Route::put('/employee/{id}', [AdminController::class, 'update'])->name('employee.update');
// Route::delete('/employee/{id}', [AdminController::class, 'destroy'])->name('employee.delete');
// Middleware to protect profile routes

Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

// Admin dashboard route (Role = 1)
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Redirect based on session
Route::get('/redirect', [RedirectController::class, 'redirect'])->name('redirect');


// Additional routes for employees and profile management

    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('employee.store');
    Route::get('/employee/{id}/edit', [AdminController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/{id}', [AdminController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{id}', [AdminController::class, 'destroy'])->name('employee.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

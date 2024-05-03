<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApoyoController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [LoginController::class, 'index'])->middleware(['auth', 'verified'])->name('login');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.admin'])->name('admin.index');

Route::get('/aprendiz', [AprendizController::class, 'index'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.aprendiz'])->name('aprendiz.index');

Route::get('/instructor', [InstructorController::class, 'index'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.instructor'])->name('instructor.index');

Route::get('/apoyo', [ApoyoController::class, 'index'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.apoyo'])->name('apoyo.index');

Route::get('/practica', [PracticaController::class, 'index'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.practica'])->name('practica.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

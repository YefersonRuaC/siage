<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\CrapController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\InhabilitadoController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\RolesController;
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

//-------------------------------------------ADMIN----------------------------------------------
Route::get('/dashboard', [RolesController::class, 'admin'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.admin'])->name('admin.index');

//-------------------------------------------APOYO----------------------------------------------
Route::get('/apoyo', [RolesController::class, 'apoyo'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.apoyo'])->name('apoyo.index');

Route::middleware(['auth', 'verified', 'auth.redirect', 'admins'])->group(function () {
    //Importar aprendices
    Route::get('/importar', [AprendicesController::class, 'index'])->name('fichas.importar');
    Route::post('/importar/aprendices', [AprendicesController::class, 'importar']);
    Route::get('/importar/actualizar', [AprendicesController::class, 'actualizar'])->name('fichas.actualizar');

    //Fichas
    Route::get('/fichas/create', [FichaController::class, 'create'])->name('fichas.create');
    Route::get('/fichas/{ficha}/edit', [FichaController::class, 'edit'])->name('fichas.edit');

    //Programas
    Route::get('/programas', [ProgramaController::class, 'index'])->name('programas.index');
    Route::get('/programas/create', [ProgramaController::class, 'create'])->name('programas.create');
    Route::get('/programas/{programa}/edit', [ProgramaController::class, 'edit'])->name('programas.edit');

    //Aprendices
    Route::get('/aprendices', [AprendicesController::class, 'inicio'])->name('aprendices.index');
    Route::get('/aprendices/create', [AprendicesController::class, 'create'])->name('aprendices.create');
    Route::get('/aprendices/{aprendiz}/edit/', [AprendicesController::class, 'edit'])->name('aprendices.edit');

    //Instructores
    Route::get('/instructores', [InstructoresController::class, 'index'])->name('instructores.index');
    Route::get('/instructores/create', [InstructoresController::class, 'create'])->name('instructores.create');
    Route::get('/instructores/{instructor}/edit', [InstructoresController::class, 'edit'])->name('instructores.edit');

    //CRaps
    Route::get('/craps/{programa}', [CrapController::class, 'craps'])->name('craps.craps');
    
    //Actividades de aprendizaje
    Route::get('/actividades/{programa}', [ActividadController::class, 'actividads'])->name('actividads.actividads');
    Route::get('/ruta/{programa}', [ActividadController::class, 'show'])->name('actividads.show');
});

//-------------------------------------------APRENDIZ----------------------------------------------
Route::get('/aprendiz', [RolesController::class, 'aprendiz'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.aprendiz'])->name('aprendiz.index');

//-------------------------------------------INSTRUCTOR----------------------------------------------
Route::get('/instructor', [RolesController::class, 'instructor'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.instructor'])->name('instructor.index');

//-------------------------------------------PRACTICA----------------------------------------------
Route::get('/practica', [RolesController::class, 'practica'])->middleware(['auth', 'verified', 'auth.redirect', 'rol.practica'])->name('practica.index');

//-------------------------------------------INHABILITADO----------------------------------------------
Route::get('/no-access', InhabilitadoController::class)->middleware(['auth', 'verified', 'auth.redirect', 'rol.inhabilitado'])->name('inhabilitado.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MovieController::class, "index"])->name('movies.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/login', [UsersController::class, 'login']); 

Route::get("/movies", [MovieController::class, "index"])->name('movies.index');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::patch('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::post('/actors', [ActorController::class, 'store'])->name('actors.store');
Route::get('/actors/create', [ActorController::class, 'create'])->name('actors.create');
Route::get('/actors/{actor}/edit', [ActorController::class, 'edit'])->name('actors.edit');
Route::patch('/actors/{actor}', [ActorController::class, 'update'])->name('actors.update');
Route::delete('/actors/{actor}', [ActorController::class, 'destroy'])->name('actors.destroy');

Route::get('/studios', [StudioController::class, 'index'])->name('studios.index');
Route::post('/studios', [StudioController::class, 'store'])->name('studios.store');
Route::get('/studios/create', [StudioController::class, 'create'])->name('studios.create');
Route::get('/studios/{studio}/edit', [StudioController::class, 'edit'])->name('studios.edit');
Route::patch('/studios/{studio}', [StudioController::class, 'update'])->name('studios.update');
Route::delete('/studios/{studio}', [StudioController::class, 'destroy'])->name('studios.destroy');

Route::get('/directors', [DirectorController::class, 'index'])->name('directors.index');
Route::post('/directors', [DirectorController::class, 'store'])->name('directors.store');
Route::get('/directors/create', [DirectorController::class, 'create'])->name('directors.create');
Route::get('/directors/{director}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
Route::patch('/directors/{director}', [DirectorController::class, 'update'])->name('directors.update');
Route::delete('/directors/{director}', [DirectorController::class, 'destroy'])->name('directors.destroy');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        //Movies CRUD
        Route::get('/movies', [MovieController::class, 'index'])->name('movie.index');
        Route::prefix('/movie')->group(function(){
            Route::get('/add',[MovieController::class, 'create'])->name('movie.create');
            Route::post('/add',[MovieController::class, 'store'])->name('movie.store');
            Route::get('/{movie}/edit',[MovieController::class, 'edit'])->name('movie.edit');
            Route::patch('/{movie}/edit',[MovieController::class, 'update'])->name('movie.update');
            Route::delete('/{movie}/delete',[MovieController::class, 'destroy'])->name('movie.destroy');
        });
    });
});


require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

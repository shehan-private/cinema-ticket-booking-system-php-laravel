<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controller\SessionController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () { // 'permission:dashboard'
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

        //Sessions CRUD
        Route::get('/sessions', [SessionController::class, 'index'])->name('session.index');
        Route::prefix('/session')->group(function(){
            Route::get('/add',[SessionController::class, 'create'])->name('session.create');
            Route::post('/add',[SessionController::class, 'store'])->name('session.store');
            Route::get('/{session}/edit',[SessionController::class, 'edit'])->name('session.edit');
            Route::patch('/{session}/edit',[SessionController::class, 'update'])->name('session.update');
            Route::get('/{session}/delete',[SessionController::class, 'destroy'])->name('session.destroy');
        });
    });
});


require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

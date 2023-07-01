<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
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
            Route::get('/{date?}/show',[SessionController::class, 'show'])->name('session.show');
            Route::get('/{session}/edit',[SessionController::class, 'edit'])->name('session.edit');
            Route::patch('/{session}/edit',[SessionController::class, 'update'])->name('session.update');
            Route::get('/{session}/delete',[SessionController::class, 'destroy'])->name('session.destroy');
        });

        //ClassModel CRUD
        Route::get('/classes', [ClassModelController::class, 'index'])->name('class.index');
        Route::prefix('/class')->group(function(){
            Route::get('/add',[ClassModelController::class, 'create'])->name('class.create');
            Route::post('/add',[ClassModelController::class, 'store'])->name('class.store');
            Route::get('/{classModel}/edit',[ClassModelController::class, 'edit'])->name('class.edit');
            Route::patch('/{classModel}/edit',[ClassModelController::class, 'update'])->name('class.update');
            Route::get('/{classModel}/delete',[ClassModelController::class, 'destroy'])->name('class.destroy');
        });

        //Screens CRUD
        Route::get('/screens', [ScreenController::class, 'index'])->name('screen.index');
        Route::prefix('/screen')->group(function(){
            Route::get('/add',[ScreenController::class, 'create'])->name('screen.create');
            Route::post('/add',[ScreenController::class, 'store'])->name('screen.store');
            Route::get('/{screen}/edit',[ScreenController::class, 'edit'])->name('screen.edit');
            Route::patch('/{screen}/edit',[ScreenController::class, 'update'])->name('screen.update');
            Route::get('/{screen}/delete',[ScreenController::class, 'destroy'])->name('screen.destroy');
        });

        //Categories CRUD
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::prefix('/category')->group(function(){
            Route::get('/add',[CategoryController::class, 'create'])->name('category.create');
            Route::post('/add',[CategoryController::class, 'store'])->name('category.store');
            Route::get('/{category}/edit',[CategoryController::class, 'edit'])->name('category.edit');
            Route::patch('/{category}/edit',[CategoryController::class, 'update'])->name('category.update');
            Route::get('/{category}/delete',[CategoryController::class, 'destroy'])->name('category.destroy');
        });

    });
});


require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

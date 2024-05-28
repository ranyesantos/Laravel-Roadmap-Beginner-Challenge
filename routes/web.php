<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ArticleController::class, 'index'])->name('blog.index');

Route::get('/about', function () {
    return view('blog.about');
})->name('blog.about');

Route::prefix('article')->group( function (){
    Route::get('/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
    Route::post('/', [ArticleController::class, 'store'])->middleware('auth')->name('article.store');
    Route::get('/{id}', [ArticleController::class,'show'])->middleware('auth')->name('article.show');
    Route::get('/{id}/edit', [ArticleController::class,'edit'])->middleware('auth')->name('article.edit');
    Route::put('/{id}', [ArticleController::class,'update'])->middleware('auth')->name('article.update');
    Route::delete('/{id}', [ArticleController::class,'destroy'])->middleware('auth')->name('article.destroy');
});

Route::prefix('home')->group(function (){
    Route::get('/category/{id}', [HomeController::class,'byCategory'])->name('home.category');

});
require __DIR__.'/auth.php';

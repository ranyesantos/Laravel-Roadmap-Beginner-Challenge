<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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
    Route::get('/tag/{id}', [HomeController::class,'byTag'])->name('home.tag');
});

Route::prefix('category')->group(function (){
    Route::get('/create', [CategoryController::class, 'create'])->middleware('auth')->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->middleware('auth')->name('category.store');
    Route::put('/{id}', [CategoryController::class,'update'])->middleware('auth')->name('category.update');
    Route::delete('/{id}', [CategoryController::class,'destroy'])->middleware('auth')->name('category.destroy');
});

Route::prefix('tag')->group(function (){
    Route::get('/create', [TagController::class, 'create'])->middleware('auth')->name('tag.create');
    Route::post('/', [TagController::class, 'store'])->middleware('auth')->name('tag.store');
    Route::put('/{id}', [TagController::class,'update'])->middleware('auth')->name('tag.update');
    Route::delete('/{id}', [TagController::class,'destroy'])->middleware('auth')->name('tag.destroy');
});

require __DIR__.'/auth.php';

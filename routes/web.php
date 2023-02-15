<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home'])
->name('home');

Route::middleware(['auth', 'verified'])
   ->name('admin.')
   ->prefix('private')
   ->group(function () {
         Route::get('/editor', [MainController :: class, 'goEdit'])
         ->name('editor');

         Route::get('/project/delete/{project}', [MainController :: class, 'goDelete'])
         ->name('project.delete');

         Route::get('/project/create', [MainController :: class, 'goCreate'])
         ->name('project.create');

         Route::get('/project/edit/{project}', [MainController :: class, 'goUpdate'])
         ->name('project.edit');
   });







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Routes op navigatiebalk
Route::get('/nieuws', function () {
    return view('pages.nieuws');
});
Route::get('/faq', function () {
    return view('pages.faq');
});
Route::get('/contact', function () {
    return view('pages.contact');
});

//Routes voor profielpagina
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route gebruiker bekijken als wel of niet ingelogd met id
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

//Routes voor contactformulier
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

require __DIR__.'/auth.php';

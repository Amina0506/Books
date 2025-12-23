<?php

use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Routes op navigatiebalk
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::resource('faq', FaqController::class)->only(['index', 'show']);

Route::get('/nieuws', [NewsController::class, 'index'])->name('pages.nieuws');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

//Routes voor profielpagina
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route gebruiker bekijken als wel of niet ingelogd met id
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

//Routes voor admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //News
    Route::get('news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/{news}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::patch('news/{news}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');

    //FAQ
    Route::get('/admin/faq', [FaqAdminController::class, 'index'])->name('admin.faq.index');
    Route::resource('faq', FaqAdminController::class)->except(['show']);

    Route::resource('faq-category', App\Http\Controllers\Admin\FaqCategoryAdminController::class)->except(['show']);

});

require __DIR__.'/auth.php';

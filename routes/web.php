<?php

use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

//Route voor for you pagina
Route::get('/for-you', [App\Http\Controllers\ForYouController::class, 'index'])->name('for-you.index')->middleware('auth');

//Routes voor profielpagina
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route gebruiker bekijken als wel of niet ingelogd met id
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/search-user', [UserController::class, 'search'])->name('user.search');

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

    //Gebruikersbeheer
    Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin', function () {
        return view('admin.home');
    })->name('admin.home');
    Route::patch('/admin/users/{user}/toggle-admin', [App\Http\Controllers\Admin\UserController::class, 'toggleAdmin'])->name('admin.users.toggleAdmin');

    //Maak nieuwe gebruiker
    Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');

    //Thema's beheren
    Route::resource('admin/themes', App\Http\Controllers\Admin\ThemeAdminController::class)->except(['show']);

    //Boek toevoegen
    Route::resource('books', App\Http\Controllers\Admin\BookAdminController::class);
});

require __DIR__.'/auth.php';

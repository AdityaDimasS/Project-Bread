<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CrudController;
use App\Livewire\Actions\Logout;

// Halaman utama
Route::view('/', 'welcome');

// Rute dashboard dan profile
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rute halaman statis (About & Contact)
Route::get('/about', [AboutController::class, 'ShowAbout'])->name('about');
Route::get('/contact', [ContactController::class, 'ShowContact'])->name('contact');

// Rute halaman menu utama
Route::get('/menu', [MenuController::class, 'ShowMenu'])->name('menu');

// Rute untuk CRUD Menu
Route::prefix('crud')->group(function () {
    Route::get('/', [CrudController::class, 'index'])->name('crud.index'); // Tampilkan daftar menu
    Route::get('/create', [CrudController::class, 'create'])->name('crud.create'); // Form tambah menu
    Route::post('/store', [CrudController::class, 'store'])->name('crud.store'); // Simpan data menu
    Route::get('/{id}/edit', [CrudController::class, 'edit'])->name('crud.edit'); // Form edit menu
    Route::put('/{id}/update', [CrudController::class, 'update'])->name('crud.update'); // Update data menu
    Route::delete('/{id}/destroy', [CrudController::class, 'destroy'])->name('crud.destroy'); // Hapus data menu
});

// Rute untuk Logout
Route::post('/logout', function () {
    $logout = new Logout();
    // $logout();
    return redirect()->route('login');  // Redirect ke halaman login
})->name('logout');

// Rute untuk operasi admin (peran admin diperlukan)
Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('crud')->group(function () {
        Route::get('/', [CrudController::class, 'index'])->name('crud.index');
        Route::get('/create', [CrudController::class, 'create'])->name('crud.create');
        Route::post('/store', [CrudController::class, 'store'])->name('crud.store');
        Route::get('/{id}/edit', [CrudController::class, 'edit'])->name('crud.edit');
        Route::put('/{id}/update', [CrudController::class, 'update'])->name('crud.update');
        Route::delete('/{id}/destroy', [CrudController::class, 'destroy'])->name('crud.destroy');
        Route::post('/{id}/restore', [CrudController::class, 'restore'])->name('crud.restore'); // Restore
        Route::delete('/{id}/force-delete', [CrudController::class, 'forceDelete'])->name('crud.forceDelete'); // Force Delete
    });
});

// Rute untuk operasi soft delete, restore, dan force delete
// Route::prefix('crud')->group(function () {
    
// });

// Rute untuk autentikasi
require __DIR__.'/auth.php';

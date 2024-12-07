<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TranscationController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;


Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


// Route::delete('/transcactions/{transcation}', [TranscationController::class, 'destroy'])->name('transcactions.destroy');


Route::resource('transcactions', TranscationController::class);
Route::resource('catalogs', CatalogController::class);
Route::resource('home', HomeController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('dashboard', DashboardController::class);



Route::resource('peminjaman', PeminjamanController::class);
Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::get('peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::delete('peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');



Route::get('/api/authors', [AuthorController::class, 'api']);
Route::get('/api/transcactions/', [TranscationController::class, 'api']);
Route::get('/api/publishers', [PublisherController::class, 'api']);
Route::get('/api/members', [MemberController::class, 'api']);
Route::get('/api/catalogs', [CatalogController::class, 'api']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

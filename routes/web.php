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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Route::delete('/transcactions/{transcation}', [TranscationController::class, 'destroy'])->name('transcactions.destroy');


Route::resource('transcactions',TranscationController::class);
Route::resource('catalogs', CatalogController::class);
Route::resource('home', HomeController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('dashboard', DashboardController::class);

Route::get('/api/authors', [AuthorController::class, 'api']);
Route::get('/api/transcactions/', [TranscationController::class, 'api']);
Route::get('/api/publishers', [PublisherController::class, 'api']);
Route::get('/api/members', [MemberController::class, 'api']);
Route::get('/api/catalogs', [CatalogController::class, 'api']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
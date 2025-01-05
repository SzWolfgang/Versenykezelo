<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FelhasznaloController;
use App\Http\Controllers\VersenyController;
use App\Http\Controllers\ForduloController;
use App\Http\Controllers\VersenyzoController;


// Kezdőlap
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Felhasználók
Route::get('/felhasznalok', [FelhasznaloController::class, 'index'])->name('felhasznalo.index');

// Versenyek 
Route::get('/versenyek', function () {
    return view('versenyek'); 
})->name('versenyek.create');

Route::post('/versenyek', [VersenyController::class, 'store'])->name('versenyek.store');

// Fordulók
Route::resource('fordulo', ForduloController::class);

// Versenyek lista
Route::get('/verseny', [VersenyController::class, 'index'])->name('verseny.index');

// Versenyzők lista és létrehozás
Route::get('/versenyzo', [VersenyzoController::class, 'index'])->name('versenyzo.index');
Route::post('/versenyzo', [VersenyzoController::class, 'store'])->name('versenyzo.store');
Route::post('/versenyzo/store', [VersenyzoController::class, 'store'])->name('versenyzo.store');
Route::post('/versenyzo/delete', [VersenyzoController::class, 'delete'])->name('versenyzo.delete');


<?php
use App\Http\Controllers\TokobukuController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TokobukuController::class, 'index'])->name('tokobuku.index');

Route::get('/books', [TokobukuController::class, 'books'])->name('tokobuku.books'); 
Route::post('/books', [TokobukuController::class, 'store'])->name('tokobuku.store'); 

Route::get('/authors', [TokobukuController::class, 'authors'])->name('tokobuku.authors');


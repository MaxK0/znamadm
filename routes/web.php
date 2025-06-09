<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\DeputyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProblemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/history', [HomeController::class, 'history'])->name('history');

Route::post('/problems', [ProblemController::class, 'store'])->name('problems.store');

Route::get('/deputies', [DeputyController::class, 'index'])->name('deputies');
Route::get('/administrations', [AdministrationController::class, 'index'])->name('administrations');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
Route::get('/documents/{type}', [DocumentController::class, 'type'])
    ->name('documents.type')
    ->where('type', '[0-9]+');

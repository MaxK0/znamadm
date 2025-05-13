<?php

use App\Http\Controllers\DeputyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/deputies', [DeputyController::class, 'index'])->name('deputies');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->name('news.show')
    ->where('news', '[0-9]+');

Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
Route::get('/documents/{type}', [DocumentController::class, 'type'])
    ->name('documents.type')
    ->where('type', '[0-9]+');

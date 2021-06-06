<?php

use Illuminate\Support\Facades\Route;

// ========================================= Public =========================================

Route::get(
    '/',
    [\App\Http\Controllers\HomeController::class, 'index']
)->name('home');

Route::get(
    '/local',
    [\App\Http\Controllers\HomeController::class, 'local']
)->name('local');

Route::get(
    '/global',
    [\App\Http\Controllers\HomeController::class, 'global']
)->name('global');

// ========================================= Authorized users only =========================================

Route::resource('article', '\App\Http\Controllers\ArticleController')->except([ 'show' ])->middleware(['auth']);
//Route::resource('article', '\App\Http\Controllers\ArticleController')->middleware(['auth']);

Route::get(
    '/article/{article}',
    [\App\Http\Controllers\ArticleController::class, 'show']
)->name('article.show');


require __DIR__.'/auth.php';

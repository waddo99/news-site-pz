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

Route::middleware(['auth'])->group(function () {
    Route::get(
        '/log',
        [\App\Http\Controllers\LogController::class, 'index']
    )->name('log');
    Route::post(
        '/log',
        [\App\Http\Controllers\LogController::class, 'index']
    )->name('log.search');

    Route::resource('article', '\App\Http\Controllers\ArticleController')->except(['show']);

    Route::get(
        '/user',
        [\App\Http\Controllers\UserController::class, 'index']
    )->name('user.index');
    Route::get(
        '/user/{user}/edit',
        [\App\Http\Controllers\UserController::class, 'edit']
    )->name('user.edit');
    Route::put(
        '/user/{user}',
        [\App\Http\Controllers\UserController::class, 'update']
    )->name('user.update');
    Route::get(
        '/user/role/{role}',
        [\App\Http\Controllers\UserController::class, 'setRole']
    )->name('user.set_role');

});

Route::get(
    '/article/{article}',
    [\App\Http\Controllers\ArticleController::class, 'show']
)->name('article.show');



require __DIR__ . '/auth.php';

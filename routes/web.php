<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/test', function () {
    // dispatch(function () {
    //     logger('Hello from queue!');
    // })->delay(5);

    $job = \App\Models\Job::find(1);
    \App\Jobs\TranslateJob::dispatch($job);
    return 'Test';
});

// Route::resource('jobs', JobController::class)->middleware('auth');
// Job resource routes
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth')->name('jobs.store');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')
    ->can('edit', 'job')
    ->name('jobs.edit');

// Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::view('/contact', 'contact');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController as UC;


Route::get('/', [UC::class, 'index'])->name('home');

Route::post('/users', [UC::class, 'store'])->name('users.store');

Route::get('/users/{id}', [UC::class, 'show'])->name('users.show');

Route::get('/users/edit/{id}', [UC::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UC::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UC::class, 'destroy'])->name('users.destroy');
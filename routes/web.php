<?php

use App\Http\Controllers\RepoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RepoController::class, 'index']); //->name('index');

Route::get('/repo/show/{id}', [RepoController::class, 'show']);

Route::get('/repo/refresh', [RepoController::class, 'refresh']); //->name('refresh');

<?php

use App\Http\Controllers\DistribuitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genealogy/{parentId?}', [DistribuitorController::class, 'index'])->name('genealogy');


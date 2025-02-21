<?php

use App\Http\Controllers\DistribuitorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('genealogy', [DistribuitorController::class, 'show'])->name('genealogy.show');

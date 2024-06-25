<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

Route::get('/', [RequestController::class, 'create']);

Route::post('/AddRequest', [RequestController::class, 'AddRequest'])->name('AddRequest');

Route::get('/thanks', [RequestController::class],'create');

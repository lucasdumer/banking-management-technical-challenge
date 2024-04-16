<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Api\V1\Controllers\TransactionController;
use App\Interfaces\Http\Api\V1\Controllers\AccountController;

Route::post('/transaction', [TransactionController::class, 'create']);
Route::post('/account', [AccountController::class, 'create']);
Route::get('/account', [AccountController::class, 'get']);

<?php

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthSsoController;

Route::post('/sso/register', [AuthSsoController::class, 'register'])->name('sso.register');
Route::post('/sso/sync', [AuthSsoController::class, 'sync'])->name('sso.sync');

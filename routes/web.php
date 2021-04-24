<?php

use App\Http\Controllers\LecturerRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LecturerRegistrationController::class, 'create'])
    ->name('create.lecturer');
Route::post('/store', [LecturerRegistrationController::class, 'store'])
    ->name('store-lecturer');

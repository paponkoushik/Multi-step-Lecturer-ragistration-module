<?php

use App\Http\Controllers\LecturerRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', [LecturerRegistration::class, 'create'])
    ->name('create.lecturer');
Route::post('/store', [LecturerRegistration::class, 'store'])
    ->name('store-lecturer');

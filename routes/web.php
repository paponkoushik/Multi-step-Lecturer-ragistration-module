<?php

use App\Http\Controllers\LecturerRegistration;
use Illuminate\Support\Facades\Route;


Route::get('/', [LecturerRegistration::class, 'lecturerView']);

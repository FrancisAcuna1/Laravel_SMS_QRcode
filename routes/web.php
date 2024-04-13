<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;


Route::get('/', [SMSController::class, 'View_form']);
Route::get('/generate_qr/{cp}/{msg}', [SMSController::class, 'qr']);
Route::post('/generate_qr', [SMSController::class, 'generate_qr']);

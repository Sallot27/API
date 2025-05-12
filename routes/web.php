<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UploadController;

Route::post('/api/data', [UploadController::class, 'uploadImage']);
Route::get('/api/images', [UploadController::class, 'getImages']);

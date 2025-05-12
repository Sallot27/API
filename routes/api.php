<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/data', function (Request $request) {
    // Handle the image upload here
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // You can move the file or process it as needed
        $path = $image->store('uploads', 'public');
        return response()->json(['message' => 'Image uploaded successfully', 'path' => $path]);
    }

    return response()->json(['error' => 'No image uploaded'], 400);
});

use App\Http\Controllers\Api\ImageController;

Route::get('/images', [ImageController::class, 'index']);


Route::post('/upload', [ImageController::class, 'upload']);

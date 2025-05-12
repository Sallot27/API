<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // Handle image upload
    public function uploadImage(Request $request)
    {
        // Validate that the file exists and is an image
        $request->validate([
            'image_' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the file in the 'public/uploads' folder
        $path = $request->file('image_')->store('data', 'api');

        // Return success message and file path
        return response()->json([
            'message' => 'File uploaded successfully',
            'file_path' => Storage::url($path)
        ]);
    }

    // Fetch the list of uploaded files
    public function getImages()
    {
        $files = Storage::files('api/data');
        $files = array_map(function ($file) {
            return Storage::url($file);
        }, $files);

        return response()->json(['images' => $files]);
    }
}

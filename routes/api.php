<?php 
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Route::post('/data', function (Request $request) {
    // Validate ID and Ref
    $request->validate([
        'ID' => 'required|string',
        'Ref' => 'required|string',
    ]);

    $id = $request->input('ID');
    $ref = $request->input('Ref');

    $savedFiles = [];

    // Loop through files that match image_0, image_1, ...
    foreach ($request->allFiles() as $key => $image) {
        if (Str::startsWith($key, 'image_') && $image->isValid()) {
            $filename = $id . '_' . $ref . '_' . $key . '_' . Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $filename);
            $savedFiles[] = [
                'key' => $key,
                'file_name' => $filename,
                'url' => asset(Storage::url('uploads/' . $filename)),
            ];
        }
    }

    return response()->json([
        'message' => 'Images uploaded successfully',
        'ID' => $id,
        'Ref' => $ref,
        'files' => $savedFiles,
    ]);
});

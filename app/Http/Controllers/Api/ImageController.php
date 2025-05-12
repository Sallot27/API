<?

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');

            return response()->json(['url' => Storage::url($path)], 201);
        }

        return response()->json(['error' => 'Image not uploaded'], 400);
    }
}
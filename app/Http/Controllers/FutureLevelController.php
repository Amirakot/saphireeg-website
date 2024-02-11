<?php

namespace App\Http\Controllers;

use App\Models\Future;
use App\Models\FutureLevel1;
use Illuminate\Http\Request;

class FutureLevelController extends Controller
{
 public function index()
    {
        $futurelevel1s = FutureLevel1::with('future')->paginate(10);
        return view('dash/futurelevel1.index', compact('futurelevel1s'));
    }

    public function create()
    {
        $futures = Future::all();
        return view('dash/futurelevel1.add', compact('futures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for images
        ]);

        $futurelevel1 = FutureLevel1::create($request->only(['title', 'description','future_id']));

        // if ($request->hasFile('image')) {
            // foreach ($request->file('image') as $file) {
                // $imagePath = $file->store('images', 'public');
                // ServiceLevel1Image::create([
                    // 'image' => $imagePath,
                    // 'service_level1_id' => $serviceLevel1->id,
                // ]);
            // }
        // }

        return redirect()->route('futurelevel1.index');
    }

    public function edit($id)
    {
        $futurelevel1= FutureLevel1::findOrFail($id);
     $futures=Future::get();
        return view('dash/futurelevel1.edit', compact('futurelevel1','futures'));
    }

    public function update(Request $request, $id)
    {
        $futurelevel1 = FutureLevel1::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $futurelevel1->update($request->only(['title', 'description','future_id']));

    //  if ($request->has('deleteImages')) {
    // $deleteImageIds = $request->input('deleteImages');
    // $deletedImages = ServiceLevel1Image::whereIn('id', $deleteImageIds)->get();

//     foreach ($deletedImages as $deletedImage) {
//         // Delete the image file from storage
//         Storage::disk('public')->delete($deletedImage->image);

//         // Delete the image record from the database
//         $deletedImage->delete();
//     }
// }


        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $file) {
        //         $imagePath = $file->store('images', 'public');
        //         ServiceLevel1Image::create([
        //             'image' => $imagePath,
        //             'service_level1_id' => $serviceLevel1->id,
        //         ]);
        //     }
        // }

        return redirect()->route('futurelevel1.index', ['id' => $futurelevel1->id]);
    }

    public function destroy($id)
    {
        $futurelevel1 = FutureLevel1::findOrFail($id);
        $futurelevel1->delete();
        return redirect()->back()->with('success', 'future Level 1 deleted successfully.');
    }
}

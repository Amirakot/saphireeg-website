<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use App\Models\VisionLevel1;
use App\Models\VisionLevel1Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Visionlevel1Controller extends Controller
{
     public function index()
    {
        $visionLevel1s = VisionLevel1::with('visionimage')->paginate(10);
        return view('dash/visionlevel1.index', compact('visionLevel1s'));
    }

    public function create()
    {
        $visions = Vision::all();
        return view('dash/visionlevel1.add', compact('visions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for images
        ]);

        $visionlevel1 = VisionLevel1::create($request->only(['title', 'description','version_id']));

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('images', 'public');
                VisionLevel1Image::create([
                    'image' => $imagePath,
                    'vision_level1_id' => $visionlevel1->id,
                ]);
            }
        }

        return redirect()->route('visionlevel1.index');
    }

    public function edit($id)
    {
        $visionLevel1 = VisionLevel1::findOrFail($id);
     $visions=Vision::get();
        return view('dash/visionlevel1.edit', compact('visionLevel1','visions'));
    }

    public function update(Request $request, $id)
    {
        $visionlevel1 = VisionLevel1::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $visionlevel1->update($request->only(['title', 'description']));

     if ($request->has('deleteImages')) {
    $deleteImageIds = $request->input('deleteImages');
    $deletedImages = VisionLevel1Image::whereIn('id', $deleteImageIds)->get();

    foreach ($deletedImages as $deletedImage) {
        // Delete the image file from storage
        Storage::disk('public')->delete($deletedImage->image);

        // Delete the image record from the database
        $deletedImage->delete();
    }
}


        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('images', 'public');
                VisionLevel1Image::create([
                    'image' => $imagePath,
                    'vision_level1_id' => $visionlevel1->id,
                ]);
            }
        }

        return redirect()->route('visionlevel1.index', ['id' => $visionlevel1->id]);
    }

    public function destroy($id)
    {
        $visionlevel1 = VisionLevel1::findOrFail($id);
        $visionlevel1->delete();
        return redirect()->back()->with('success', 'visionlevel1 Level 1 deleted successfully.');
    }
}

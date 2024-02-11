<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceLevel1;
use App\Models\ServiceLevel1Image;
use Illuminate\Support\Facades\Storage;

class ServiceLevel1Controller extends Controller
{
    public function index()
    {
        $serviceLevel1s = ServiceLevel1::with('serviceimage')->paginate(10);
        return view('dash/servicelevel1.index', compact('serviceLevel1s'));
    }

    public function create()
    {
        $services = Service::all();
        return view('dash/servicelevel1.add', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for images
        ]);

        $serviceLevel1 = ServiceLevel1::create($request->only(['title', 'description', 'date','service_id']));

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('images', 'public');
                ServiceLevel1Image::create([
                    'image' => $imagePath,
                    'service_level1_id' => $serviceLevel1->id,
                ]);
            }
        }

        return redirect()->route('servicelevel1.index');
    }

    public function edit($id)
    {
        $serviceLevel1 = ServiceLevel1::findOrFail($id);
     $services=Service::get();
        return view('dash/servicelevel1.edit', compact('serviceLevel1','services'));
    }

    public function update(Request $request, $id)
    {
        $serviceLevel1 = ServiceLevel1::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $serviceLevel1->update($request->only(['title', 'description']));

     if ($request->has('deleteImages')) {
    $deleteImageIds = $request->input('deleteImages');
    $deletedImages = ServiceLevel1Image::whereIn('id', $deleteImageIds)->get();

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
                ServiceLevel1Image::create([
                    'image' => $imagePath,
                    'service_level1_id' => $serviceLevel1->id,
                ]);
            }
        }

        return redirect()->route('servicelevel1.index', ['id' => $serviceLevel1->id]);
    }

    public function destroy($id)
    {
        $serviceLevel1 = ServiceLevel1::findOrFail($id);
        $serviceLevel1->delete();
        return redirect()->back()->with('success', 'Service Level 1 deleted successfully.');
    }
}

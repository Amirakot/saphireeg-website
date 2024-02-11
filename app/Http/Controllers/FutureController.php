<?php

namespace App\Http\Controllers;

use App\Models\Future;
use App\Models\FutureImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FutureController extends Controller
{
    public function index()
    {
        $futures = Future::with('futureimage')->paginate(10);
        return view('dash/future.index', compact('futures'));
    }

    public function create()
    {
        $futures = Future::all();
        return view('dash/future.add', compact('futures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for images
        ]);

 $user_id = Auth::id();

$future = Future::create($request->only('title', 'description') + ['user_id' => $user_id]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('images', 'public');
                FutureImage::create([
                    'image' => $imagePath,
                    'future_id' => $future->id,
                ]);
            }
        }

        return redirect()->route('future.index');
    }

    public function edit($id)
    {
        $future= Future::findOrFail($id);
    //  $future=Future::get();
        return view('dash/future.edit', compact('future'));
    }

    public function update(Request $request, $id)
    {
        $future = Future::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $future->update($request->only(['title', 'description']));

     if ($request->has('deleteImages')) {
    $deleteImageIds = $request->input('deleteImages');
    $deletedImages = FutureImage::whereIn('id', $deleteImageIds)->get();

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
                FutureImage::create([
                    'image' => $imagePath,
                    'future_id' => $future->id,
                ]);
            }
        }

        return redirect()->route('future.index', ['id' => $future->id]);
    }

    public function destroy($id)
    {
        $future= Future::findOrFail($id);
        $future->delete();
        return redirect()->back()->with('success', ' future deleted successfully.');
    }
}

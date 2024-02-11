<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('newsimage')->paginate(10);
        return view('dash/new.index', compact('news'));
    }

    public function create()
    {
        // $new = News::all();
        return view('dash/new.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for images
        ]);
        // $new = News::create($request->only('title', 'description') + ['user_id' => $user_id]);
 $user_id = Auth::id();


        $new = News::create($request->only('title', 'description', 'date','new_id')+ ['user_id' => $user_id]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('images', 'public');
                NewsImage::create([
                    'image' => $imagePath,
                    'news_id' => $new->id,
                ]);
            }
        }

        return redirect()->route('new.index');
    }

    public function edit($id)
    {
         $new=News::findOrFail($id);
    //  $new=News::get();
        return view('dash/new.edit', compact('new'));
    }

    public function update(Request $request, $id)
    {
        $new = News::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $new->update($request->only(['title', 'description','date']));

     if ($request->has('deleteImages')) {
    $deleteImageIds = $request->input('deleteImages');
    $deletedImages = NewsImage::whereIn('id', $deleteImageIds)->get();

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
                NewsImage::create([
                    'image' => $imagePath,
                    'news_id' => $new->id,
                ]);
            }
        }

        return redirect()->route('new.index', ['id' => $new->id]);
    }

    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return redirect()->back()->with('success', 'new Level 1 deleted successfully.');
    }
}

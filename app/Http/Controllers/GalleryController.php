<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
 public function index()
    {
       $gallerys=Gallery::paginate(10);
        //
        return view('dash.gallery.index',compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 return view('dash.gallery.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $fileName);
$data=[
              'title' => $request->title,

            //   'description' => $request->description,
'image' => 'images/' . $fileName ,


              'user_id' => Auth::id(),
];
$gallery=Gallery::create($data);


 return  redirect()->route('gallery.index')->with([
            'message' => 'gallery add successfully',
            'alert-type' => 'success'
        ]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery=Gallery::findorFail($id);
        return view('dash.gallery.edit',compact('gallery'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $gallery=Gallery::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($gallery->image) {
        $oldImagePath = public_path($gallery->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $gallery->update([
        'title' => $request->title,
        // 'description' => $request->description,
        'image' => 'images/' . $fileName,
    ]);
} else {
    $gallery->update([
        'title' => $request->title,
        // 'description' => $request->description,
    ]);
}
     return  redirect()->route('gallery.index')->with([
            'message' => 'gallery added successfully',
            'alert-type' => 'success'
        ]);
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery=Gallery::findOrFail($id);
        $gallery->delete();
  return  redirect()->route('gallery.index')->with([
            'message' => 'gallery deleted successfully',
            'alert-type' => 'success'
        ]);
        //
    }
}

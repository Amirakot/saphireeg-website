<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllRequest;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
    {
       $visions=Vision::paginate(10);
        //
        return view('dash.vision.index',compact('visions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 return view('dash.vision.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AllRequest $request)
    {
 $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $fileName);
$data=[
              'title' => $request->title,

              'description' => $request->description,
'image' => 'images/' . $fileName ,


            //   'user_id' => Auth::id(),
];
$vision=Vision::create($data);


 return  redirect()->route('vision.index')->with([
            'message' => 'vision add successfully',
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
        $vision=Vision::findorFail($id);
        return view('dash.vision.edit',compact('vision'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $vision=Vision::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($vision->image) {
        $oldImagePath = public_path($vision->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $vision->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => 'images/' . $fileName,
    ]);
} else {
    $vision->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('vision.index')->with([
            'message' => 'vision added successfully',
            'alert-type' => 'success'
        ]);
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vision=Vision::findOrFail($id);
        $vision->delete();
  return  redirect()->route('vision.index')->with([
            'message' => 'vision deleted successfully',
            'alert-type' => 'success'
        ]);
        //
    }
}

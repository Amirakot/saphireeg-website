<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\About;

use App\Http\Requests\AllRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $abouts=About::paginate(10);
        //
        return view('dash.abouts.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 return view('dash.abouts.add');
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


              'user_id' => Auth::id(),
];
$about=About::create($data);


 return  redirect()->route('about.index')->with([
            'message' => 'about add successfully',
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
        $about=About::findorFail($id);
        return view('dash.abouts.edit',compact('about'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $about=About::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($about->image) {
        $oldImagePath = public_path($about->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $about->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => 'images/' . $fileName,
    ]);
} else {
    $about->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('about.index')->with([
            'message' => 'about added successfully',
            'alert-type' => 'success'
        ]);
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

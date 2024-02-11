<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\About;

use App\Http\Requests\AllRequest;
use App\Models\About;
use App\Models\AboutLevel1;

class AboutLevel1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $aboutLevels=AboutLevel1::orderBy("created_at","desc")->paginate(10);
    return view('dash.aboutlevel1.index',compact('aboutLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $abouts=About::orderBy("created_at","desc")->paginate(10);
        //
        $aboutLevel=AboutLevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.aboutlevel1.add',compact('aboutLevel','abouts'));

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
'about_id'=>$request->about_id,


              'user_id' => Auth::id(),
];
$aboutlevel=AboutLevel1::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newPaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('aboutlevel1.index')->with([
            'message' => 'aboutlevel add successfully',
            'alert-type' => 'success'
        ]);
        //
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
        //
         $abouts=About::all();
         $aboutlevel1=AboutLevel1::findOrFail($id);
        return view('dash.aboutlevel1.edit',compact('abouts','aboutlevel1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $aboutlevel=AboutLevel1::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($aboutlevel->image) {
        $oldImagePath = public_path($aboutlevel->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $aboutlevel->update([
        'title' => $request->title,
        'description' => $request->description,
        'about_id' => $request->about_id,

        'image' => 'images/' . $fileName,
    ]);
} else {
    $aboutlevel->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('aboutlevel1.index')->with([
            'message' => 'aboutlevel1 added successfully',
            'alert-type' => 'success'
        ]);
        //
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

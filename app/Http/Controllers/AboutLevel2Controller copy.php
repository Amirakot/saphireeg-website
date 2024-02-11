<?php

namespace App\Http\Controllers;

use App\Models\AboutLevel1;
use App\Models\AboutLevel2;
use Illuminate\Support\Facades\Auth;
// use App\Models\About;

use App\Http\Requests\AllRequest;
use Illuminate\Http\Request;

class AboutLevel2Controller extends Controller
{
    public function index()
    {
        //
        $aboutLevel2=AboutLevel2::orderBy("created_at","desc")->paginate(10);
    return view('dash.aboutlevel2.index',compact('aboutLevel2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aboutlevel1=AboutLevel1::orderBy("created_at","desc")->paginate(10);
        //
        // $aboutLevel=AboutLevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.aboutlevel2.add',compact('aboutlevel1'));

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
'about_level1_id'=>$request->about_level1_id,


              'user_id' => Auth::id(),
];
$aboutlevel=AboutLevel2::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newPaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('aboutlevel2.index')->with([
            'message' => 'aboutlevel2 add successfully',
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
         $aboutlevel1=AboutLevel1::all();
         $aboutlevel2=AboutLevel2::findOrFail($id);
        return view('dash.aboutlevel2.edit',compact('aboutlevel1','aboutlevel2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $aboutlevel2=AboutLevel2::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($aboutlevel2->image) {
        $oldImagePath = public_path($aboutlevel2->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $aboutlevel2->update([
        'title' => $request->title,
        'description' => $request->description,
        'about_id' => $request->about_id,

        'image' => 'images/' . $fileName,
    ]);
} else {
    $aboutlevel2->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('aboutlevel2.index')->with([
            'message' => 'aboutlevel2 added successfully',
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

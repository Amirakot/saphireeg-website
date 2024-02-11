<?php

namespace App\Http\Controllers;

use App\Models\VisionLevel1;
use App\Models\VisionLevel2;
use Illuminate\Http\Request;

class Visionlevel2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        //
        $visionLevel2=VisionLevel2::with("versionlevel1")->paginate(10);
    return view('dash.visionlevel2.index',compact('visionLevel2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visionlevel1=VisionLevel1::paginate(10);
        //
        // $aboutLevel=AboutLevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.visionlevel2.add',compact('visionlevel1'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $fileName);
$data=[
              'title' => $request->title,

              'description' => $request->description,
// 'image' => 'images/' . $fileName ,
'version_level1_id'=>$request->version_level1_id,


            //   'user_id' => Auth::id(),
];
$visionlevel2=VisionLevel2::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newPaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('visionlevel2.index')->with([
            'message' => 'visionlevel2 add successfully',
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
         $visionlevel1=VisionLevel1::all();
         $visionlevel2=VisionLevel2::findOrFail($id);
        return view('dash.visionlevel2.edit',compact('visionlevel1','visionlevel2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $visionlevel2=VisionLevel2::findorFail($id);
        // if ($request->hasFile('image')) {
    // Delete the old image if needed
    // if ($aboutlevel2->image) {
        // $oldImagePath = public_path($aboutlevel2->image);
        // if (file_exists($oldImagePath)) {
            // unlink($oldImagePath);
        // }
    // }

    // Upload the new image
    // $fileName = time() . '.' . $request->image->extension();
    // $request->image->move(public_path('images'), $fileName);

    $visionlevel2->update([
        'title' => $request->title,
        'description' => $request->description,
        'version_level1_id' => $request->vision_level1_id,

        // 'image' => 'images/' . $fileName,
    ]);

     return  redirect()->route('visionlevel2.index')->with([
            'message' => 'visionlevel2 added successfully',
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
          $visionlevel2 = VisionLevel2::findOrFail($id);
        $visionlevel2->delete();
        return redirect()->back()->with('success', 'visionlevel2  deleted successfully.');
        //
    }
}

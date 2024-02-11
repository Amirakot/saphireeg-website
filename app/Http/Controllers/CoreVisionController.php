<?php

namespace App\Http\Controllers;

use App\Models\CoreVision;
use App\Models\VisionLevel1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoreVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        //
        $corevision=CoreVision::with("versionlevel1")->paginate(10);
    return view('dash.corevision.index',compact('corevision'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visionlevel1=VisionLevel1::paginate(10);
        //
        // $aboutLevel=AboutLevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.corevision.add',compact('visionlevel1'));

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
'vision_level1_id'=>$request->vision_level1_id,


              'user_id' => Auth::id(),
];
$visionlevel2=CoreVision::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newPaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('corevision.index')->with([
            'message' => 'corevision add successfully',
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
         $corevision=CoreVision::findOrFail($id);
        return view('dash.corevision.edit',compact('visionlevel1','corevision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $corevision=CoreVision::findorFail($id);
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

    $corevision->update([
        'title' => $request->title,
        'description' => $request->description,
        'vision_level1_id' => $request->vision_level1_id,

        // 'image' => 'images/' . $fileName,
    ]);

     return  redirect()->route('corevision.index')->with([
            'message' => 'corevision added successfully',
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
          $corevision = CoreVision::findOrFail($id);
        $corevision->delete();
        return redirect()->back()->with('success', 'corevision  deleted successfully.');
        //
    }
}

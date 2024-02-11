<?php

namespace App\Http\Controllers;

use App\Models\VisionHeaderImage;
use App\Models\VisionLevel1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VisionHeaderController extends Controller
{
     public function index()
    {
        $image=VisionHeaderImage::with('visionlevel1')->get();
        return view('dash/visionheaderimage.index',compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
$visionlevel1=VisionLevel1::select('title','id')->get();
     return view('dash/visionheaderimage.add',compact('visionlevel1'));   //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              $validators=
            Validator::make($request->all(), [

            'image'=>'required|mimes:jpg,png',

        ]);
       if ($validators->fails())
       {
       return redirect()->back()->withErrors($validators)->withInput();
       }
$fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $fileName);
    $data=[
          'image' => 'images/' . $fileName // Store the path to the image in the database
,
'version_level1_id'=>$request->vision_level1_id,

              'user_id' => Auth::id(),
        ];
        $vision=VisionHeaderImage::create($data);
         return  redirect()->route('visionheaderimage.index');
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
$visionlevel1 =VisionLevel1::select('title','id')->get();
        $headerimage=VisionHeaderImage::findorFail($id);
    return view('dash/visionheaderimage.edit',compact('headerimage','visionlevel1'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $headerimage= VisionHeaderImage::findOrFail($id);

        // $request->validate([
        //    ',

        // ]);
         if ($request->has('deleteImages')) {
            $deleteImageIds = $request->input('deleteImages');

            // Delete the image records from the database
            $headerimage->whereIn('id', $deleteImageIds)->delete();
     }


 if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($headerimage->image) {
        $oldImagePath = public_path($headerimage->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    // Update the header image with the new image path
    $headerimage->update([
        'image' => 'images/' . $fileName,
'version_level1_id'=>$request->vision_level_id,

    ]);
}






        return redirect()->route('visionheaderimage.index');

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

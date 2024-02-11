<?php

namespace App\Http\Controllers;

use App\Models\ServiceLevel1;
use App\Models\ServiceLevel2;
use Illuminate\Http\Request;

class ServiceLevel2Controller extends Controller
{
    public function index()
    {
        //
        $serviceLevel2=ServiceLevel2::orderBy("created_at","desc")->paginate(10);
    return view('dash.servicelevel2.index',compact('serviceLevel2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicelevel1=ServiceLevel1::with("servicelevel2")->paginate(10);
        //
        // $aboutLevel=AboutLevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.servicelevel2.add',compact('servicelevel1'));

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
'service_level1_id'=>$request->service_level1_id,


            //   'user_id' => Auth::id(),
];
$servicelevel2=ServiceLevel2::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newPaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('servicelevel2.index')->with([
            'message' => 'servicelevel2 add successfully',
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
         $servicelevel1=ServiceLevel1::all();
         $servicelevel2=ServiceLevel2::findOrFail($id);
        return view('dash.servicelevel2.edit',compact('servicelevel1','servicelevel2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $servicelevel2=ServiceLevel2::findorFail($id);
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

    $servicelevel2->update([
        'title' => $request->title,
        'description' => $request->description,
        'service_level1_id' => $request->service_level1_id,

        // 'image' => 'images/' . $fileName,
    ]);

     return  redirect()->route('servicelevel2.index')->with([
            'message' => 'servicelevel2 added successfully',
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllRequest;
use App\Models\Fleet;
use App\Models\Fleetlevel1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FleetLevelController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fleetlevel1s =Fleetlevel1::orderBy("created_at","desc")->paginate(10);
    return view('dash.fleetlevel.index',compact('fleetlevel1s'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fleets=Fleet::orderBy("created_at","desc")->paginate(10);
        //
        $fleetlevel1=Fleetlevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.fleetlevel.add',compact('fleetlevel1','fleets'));

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
'fleet_id'=>$request->fleet_id,


              'user_id' => Auth::id(),
];
$fleetlevel1=FleetLevel1::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newPaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('fleetlevel1.index')->with([
            'message' => 'fleetlevel add successfully',
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
         $fleets=Fleet::all();
         $fleetlevel1=Fleetlevel1::findOrFail($id);
        return view('dash.fleetlevel.edit',compact('fleets','fleetlevel1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $fleetlevel1=Fleetlevel1::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($fleetlevel1->image) {
        $oldImagePath = public_path($fleetlevel1->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $fleetlevel1->update([
        'title' => $request->title,
        'description' => $request->description,
        'about_id' => $request->about_id,

        'image' => 'images/' . $fileName,
    ]);
} else {
    $fleetlevel1->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('fleetlevel1.index')->with([
            'message' => 'fleetlevel added successfully',
            'alert-type' => 'success'
        ]);
        //
        //

    }
    public function destroy($id)
    {
        $fleetlevel1 = Fleetlevel1::findOrFail($id);
        $fleetlevel1->delete();
        return redirect()->back()->with('success', 'fleet Level 1 deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllRequest;
use App\Models\Fleet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FleetController extends Controller
{    /**
     * Display a listing of the resource.
     */
 public function index()
    {
       $fleets=Fleet::paginate(10);
        //
        return view('dash.fleet.index',compact('fleets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 return view('dash.fleet.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//  $fileName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $fileName);
$data=[
              'title' => $request->title,

            //   'description' => $request->description,
// 'image' => 'images/' . $fileName ,


              'user_id' => Auth::id(),
];
// dd($data);
$fleet=Fleet::create($data);



 return  redirect()->route('fleet.index')->with([
            'message' => 'fleet add successfully',
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
        $fleet=Fleet::findorFail($id);
        return view('dash.fleet.edit',compact('fleet'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $fleet=Fleet::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($fleet->image) {
        $oldImagePath = public_path($fleet->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $fleet->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => 'images/' . $fileName,
    ]);
} else {
    $fleet->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('fleet.index')->with([
            'message' => 'fleet added successfully',
            'alert-type' => 'success'
        ]);
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fleet=Fleet::findOrFail($id);
        $fleet->delete();
  return  redirect()->route('fleet.index')->with([
            'message' => 'fleet deleted successfully',
            'alert-type' => 'success'
        ]);
        //
    }
}

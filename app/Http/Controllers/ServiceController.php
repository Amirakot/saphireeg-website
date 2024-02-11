<?php

namespace App\Http\Controllers;

use App\Models\Service;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\About;

use App\Http\Requests\AllRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
    {
       $services=Service::paginate(10);
        //
        return view('dash.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 return view('dash.service.add');
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
$service=Service::create($data);


 return  redirect()->route('service.index')->with([
            'message' => 'service add successfully',
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
        $service=Service::findorFail($id);
        return view('dash.service.edit',compact('service'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $service=Service::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($service->image) {
        $oldImagePath = public_path($service->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $service->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => 'images/' . $fileName,
    ]);
} else {
    $service->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('service.index')->with([
            'message' => 'service added successfully',
            'alert-type' => 'success'
        ]);
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service=Service::findOrFail($id);
        $service->delete();
  return  redirect()->route('service.index')->with([
            'message' => 'service deleted successfully',
            'alert-type' => 'success'
        ]);
        //
    }
}

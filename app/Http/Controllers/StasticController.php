<?php

namespace App\Http\Controllers;

use App\Models\Stastic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StasticController extends Controller
{
  public function index()
    {
        //
        $stastic=Stastic::orderBy("created_at","desc")->paginate(10);
    return view('dash.stastic.index',compact('stastic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stastic=Stastic::orderBy("created_at","desc")->paginate(10);
        //
        // $aboutLevel=AboutLevel1::orderBy("created_at","desc")->paginate(10);
            return view('dash.stastic.add',compact('stastic'));

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
// 'about_level1_id'=>$request->about_level1_id,


              'user_id' => Auth::id(),
];
$stastic=Stastic::create($data);
// $newPaths = $this->uploadimage($request, 'images');
//               foreach ($newaths as $newPath) {
//                 Abo::create([
//                       'path' => $newPath['path'],
//                       'certificate_id' => $certificate->id,
//                   ]);
//               }

 return  redirect()->route('stastic.index')->with([
            'message' => 'stastic add successfully',
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
         $stastic=Stastic::findOrFail($id);
        //  $aboutlevel2=AboutLevel2::findOrFail($id);
        return view('dash.stastic.edit',compact('stastic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $stastic=Stastic::findorFail($id);
        // if ($request->hasFile('image')) {
    // Delete the old image if needed
    // if ($stastic->image) {
        // $oldImagePath = public_path($stastic->image);
        // if (file_exists($oldImagePath)) {
            // unlink($oldImagePath);
        // }
    // }

    // Upload the new image
    // $fileName = time() . '.' . $request->image->extension();
    // $request->image->move(public_path('images'), $fileName);

    $stastic->update([
        'title' => $request->title,
        'description' => $request->description,
        // 'about_id' => $request->about_id,

        // 'image' => 'images/' . $fileName,
    ]);
// } else {
    // $aboutlevel2->update([
        // 'title' => $request->title,
        // 'description' => $request->description,
    // ]);
// }
     return  redirect()->route('stastic.index')->with([
            'message' => 'stastic added successfully',
            'alert-type' => 'success'
        ]);
        //
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stastic = Stastic::findOrFail($id);
        $stastic->delete();
        return redirect()->back()->with('success', 'stastic Level 1 deleted successfully.');
        //
    }
}

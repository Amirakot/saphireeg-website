<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider=Slider::all();
       return view('dash.slider.index',compact('slider'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.slider.add');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $sliderrequest)
    {

        $fileName = time() . '.' . $sliderrequest->image->extension();
        $sliderrequest->image->move(public_path('images'), $fileName);
$data=[
              'title' => $sliderrequest->title,

              'description' => $sliderrequest->description,
'image' => 'images/' . $fileName ,


              'user_id' => Auth::id(),
];
$slider=Slider::create($data);


 return  redirect()->route('slider.index')->with([
            'message' => 'slider add successfully',
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
        //
        $slider=Slider::findorFail($id);
        return view('dash.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $id,Request $request)
    {
        $slider=Slider::findorFail($id);
        if ($request->hasFile('image')) {
    // Delete the old image if needed
    if ($slider->image) {
        $oldImagePath = public_path($slider->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Upload the new image
    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $fileName);

    $slider->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => 'images/' . $fileName,
    ]);
} else {
    $slider->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);
}
     return  redirect()->route('slider.index')->with([
            'message' => 'slider added successfully',
            'alert-type' => 'success'
        ]);
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

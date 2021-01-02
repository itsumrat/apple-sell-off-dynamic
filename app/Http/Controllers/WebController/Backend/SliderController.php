<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;
use Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('backend.slider.index', compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::all();
        // dd($sliders);
        return view('backend.slider.create', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($slider_img = $request->file('slider_img')) {
            $filename = rand(10, 100) . time() . '.' . $slider_img->getClientOriginalExtension();
            $location = public_path('/uploads/slider/' . $filename);
            Image::make($slider_img)->resize(2000, 1125)->save($location);

        }
        $data = Slider::create($request->except('slider_img') +
            [
                'slider_img' => $filename,
            ]);

        Toastr::success('Slider successfully created:)', 'Success');
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Slider::find($id);
        $slider_image = $data->slider_img;
        if ($image = $request->file('slider_img')) {
            $slider_image = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/uploads/slider/' . $slider_image);
            Image::make($image)->resize(2000, 1125)->save($location);
            $oldFilename = $data->slider_img;
            $data->slider_img = $slider_image;
            Storage::delete('/uploads/slider/' . $oldFilename);
        }
        // Slider info update
        $data->update($request->except('slider_img') +
            [
                'slider_img' => $slider_image,
            ]);

        Toastr::success('Slider successfully updated:)', 'Success');
        return redirect()->route('slider.index');

    }
    // Status Update
    public function updateSliderStatus(Request $request)
    {
        $data = Slider::find($request->status);
        if ($data->status == 0) {
            $data = $data->update($request->except('status') + ['status' => 1]);
        } else {
            $data->status = 0;
            $data->save();
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Slider::find($id);
        $oldFilename = $data->slider_img;
        Storage::delete('/uploads/slider/' . $oldFilename);
        $data->delete();

        Toastr::error('Slider successfully deleted:)', 'Deleted');
        return redirect()->route('slider.index');
    }
}

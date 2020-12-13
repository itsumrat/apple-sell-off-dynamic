<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Logo;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use Intervention\Image\ImageManager;
use Storage;


class LogoController extends Controller
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
        $logos = Logo::all();
        return view('backend.logo.index', compact('logos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($logo = $request->file('logo')) {
            $filename = rand(10, 100) . time() . '.' . $logo->getClientOriginalExtension();
            $location = public_path('/uploads/logo/' . $filename);
            Image::make($logo)->resize(230, 90)->save($location);

        }
        $data = Logo::create($request->except('logo') +
            [
                'logo' => $filename,
            ]);

        Toastr::success('Logo successfully created:)', 'Success');
        return redirect()->route('logo.index');
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
        $logo = Logo::find($id);
        return view('backend.logo.edit', compact('logo'));
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
        $data = Logo::find($id);
        $logo = $data->logo;
        if ($image = $request->file('logo')) {
            $logo_image = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/uploads/logo/' . $logo_image);
            Image::make($image)->resize(230, 90)->save($location);
            $oldFilename = $data->logo;
            $data->logo = $logo_image;
            Storage::delete('/uploads/logo/' . $oldFilename);
        }
        // logo info update
        $data = $data->update($request->except('logo') +
            [
                'logo' => $logo_image,
            ]);

        Toastr::success('Logo successfully updated:)', 'Success');
        return redirect()->route('logo.index');

    }
    // Status Update
    public function updatelogoStatus(Request $request)
    {
        $data = Logo::find($request->status);
        if ($data->status == 0) {
            $data = $data->update($request->except('status') + ['status' => 1]);
        } else {
            $data->status = 0;
            $data->save();
        }
        return redirect()->route('logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Logo::find($id);
        $oldFilename = $data->logo;
        Storage::delete('/uploads/logo/' . $oldFilename);
        $data->delete();

        Toastr::error('Logo successfully deleted:)', 'Deleted');
        return redirect()->route('logo.index');
    }
}

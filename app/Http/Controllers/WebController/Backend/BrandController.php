<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Brand;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Storage;
use Image;
use Intervention\Image\ImageManager;

class BrandController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index','show']]);
         $this->middleware('permission:brand-create', ['only' => ['create','store']]);
         $this->middleware('permission:brand-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'brand_name' => 'required',
            'brand_icon' => 'required|mimes:jpeg,jpg,png|max:300',
        ]);

        $slug = Str::of($request->brand_name)->slug('_');
    
        if ($brand_icon = $request->file('brand_icon')) {
            $filename = rand(10, 100) . time().'.'.$brand_icon->getClientOriginalExtension();
            $location = public_path('/uploads/brand/'. $filename);
            Image::make($brand_icon)->resize(100, 50)->save($location);
        }

        Brand::create($request->except('brand_icon', 'brand_slug')+[
            'brand_icon' => $filename,
            'brand_slug' => $slug
        ]);

        Toastr::success('Brand successfully created:)','Success');
        return redirect()->route('brands.index');
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
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
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
        request()->validate([
            'brand_name' => 'required',
            'brand_icon' => 'nullable|mimes:jpeg,jpg,png|max:300',
        ]);
        $data = Brand::find($id);
        // for brand image update
        $mcIcon = $data->brand_icon;
        if (!empty($request->brand_name)) {
            $slug = Str::of($request->brand_name)->slug('_');
        }else {
            $slug = $data->brand_slug;
        }
        

        if ($image = $request->file('brand_icon')) {
            $mcIcon = rand(10, 100) . time().'.'.$image->getClientOriginalExtension();
            $location = public_path('/uploads/brand/'. $mcIcon);
            Image::make($image)->resize(100, 50)->save($location);
            $oldFilename = $data->brand_icon;
            $data->brand_icon = $mcIcon;
            Storage::delete('/uploads/brand/'. $oldFilename);
        }
        // brand info update
        $data = $data->update($request->except('brand_icon')+[
            'brand_icon' => $mcIcon,
            'brand_slug' => $slug
        ]);

        Toastr::success('Brand successfully updated:)','Success');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::find($id);
        $oldFilename = $data->mc_icon;
        Storage::delete('/uploads/brand/'. $oldFilename);
        $data->delete();
        
        Toastr::error('Brand successfully deleted:)','Deleted');
        return redirect()->route('brands.index');
    }
}

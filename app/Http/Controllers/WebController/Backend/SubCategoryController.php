<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\MainCategory;
use App\Model\Backend\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Storage;
use Image;
use Intervention\Image\ImageManager;

class SubCategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories  = SubCategory::with('mainCategoryForSub')->get();
        return view('backend.category.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincategory = MainCategory::all();
        return view('backend.category.subcategory.create', compact('maincategory'));
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
            'main_category_id' => 'required',
            'sc_name' => 'required',
            'scoverimage' => 'required|mimes:jpeg,jpg,png|max:200',
        ]);

        if ($scoverimage = $request->file('scoverimage')) {
            $cover = rand(10, 100) . time().'.'.$scoverimage->getClientOriginalExtension();
            $locationc = public_path('/uploads/category/'. $cover);
            Image::make($scoverimage)->resize(250, 250)->save($locationc);
        }

        $slug = Str::of($request->sc_name)->slug('_');

        SubCategory::create($request->except('sc_slug', 'scoverimage')+[
            'sc_slug' => $slug,
            'scoverimage' => $cover
        ]);

        Toastr::success('Sub category successfully created:)','Success');
        return redirect()->route('subcategory.index');
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
        $maincategory = MainCategory::all();
        $subcategory = SubCategory::find($id);
        return view('backend.category.subcategory.edit', compact('subcategory', 'maincategory'));
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
        $data = SubCategory::find($id);
        $scoverimage = $data->scoverimage;
        if (!empty($request->sc_name)) {
            $slug = Str::of($request->sc_name)->slug('_');
        }else {
            $slug = $data->sc_slug;
        }

        if ($image = $request->file('scoverimage')) {
            $scoverimage = rand(10, 100) . time().'.'.$image->getClientOriginalExtension();
            $locationc = public_path('/uploads/category/'. $scoverimage);
            Image::make($image)->resize(250, 250)->save($locationc);
            $oldFilenamec = $data->scoverimage;
            $data->scoverimage = $scoverimage;
            Storage::delete('/uploads/category/'. $oldFilenamec);
        }

        // subcategory info update
        $data = $data->update($request->except('sc_slug', 'scoverimage')+[
            'sc_slug' => $slug,
            'scoverimage' => $scoverimage
        ]);

        Toastr::success('Sub category successfully updated:)','Success');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SubCategory::find($id);
        $data->delete();
        Toastr::error('Sub category successfully deleted:)','Deleted');
        return redirect()->route('subcategory.index');
    }
}

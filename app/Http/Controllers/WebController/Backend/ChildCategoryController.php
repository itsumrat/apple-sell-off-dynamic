<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\ChildCategory;
use App\Model\Backend\MainCategory;
use App\Model\Backend\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use Intervention\Image\ImageManager;

class ChildCategoryController extends Controller
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
        $childcategories  = ChildCategory::with('mainCategoryForChild', 'subCategoryForChild')->get();
        return view('backend.category.childcategory.index', compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincategory = MainCategory::all();
        $subcategory = SubCategory::all();
        return view('backend.category.childcategory.create', compact('maincategory', 'subcategory'));
    }

    public function getSubcategory($id)
     {
        $subcategory = SubCategory::where('main_category_id', $id)->pluck('sc_name', 'id');
        return json_encode($subcategory);
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
            'sub_category_id' => 'required',
            'cc_name' => 'required',
        ]);

        if ($ccoverimage = $request->file('ccoverimage')) {
            $cover = rand(10, 100) . time().'.'.$ccoverimage->getClientOriginalExtension();
            $locationc = public_path('/uploads/category/'. $cover);
            Image::make($ccoverimage)->resize(250, 250)->save($locationc);
        }

        $slug = Str::of($request->cc_name)->slug('_');

        ChildCategory::create($request->except('cc_slug', 'ccoverimage')+[
            'cc_slug' => $slug,
            'ccoverimage' => $cover
        ]);

        Toastr::success('Child category successfully created:)','Success');
        return redirect()->route('childcategory.index');
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
        $subcategory = SubCategory::all();
        $childcategory = ChildCategory::find($id);
        return view('backend.category.childcategory.edit', compact('childcategory', 'maincategory', 'subcategory'));
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
        $data = ChildCategory::find($id);
        $ccoverimage = $data->ccoverimage;
        if (!empty($request->cc_name)) {
            $slug = Str::of($request->cc_name)->slug('_');
        }else {
            $slug = $data->cc_slug;
        }

        if ($image = $request->file('ccoverimage')) {
            $ccoverimage = rand(10, 100) . time().'.'.$image->getClientOriginalExtension();
            $locationc = public_path('/uploads/category/'. $ccoverimage);
            Image::make($image)->resize(250, 250)->save($locationc);
            $oldFilenamec = $data->ccoverimage;
            $data->ccoverimage = $ccoverimage;
            Storage::delete('/uploads/category/'. $oldFilenamec);
        }

        // childcategory info update
        $data = $data->update($request->except('cc_slug', 'ccoverimage')+
            [
                'cc_slug' => $slug,
                'ccoverimage' => $ccoverimage
            ]);

        Toastr::success('Child category successfully updated:)','Success');
        return redirect()->route('childcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ChildCategory::find($id);
        $data->delete();
        Toastr::error('Child category successfully deleted:)','Deleted');
        return redirect()->route('childcategory.index');
    }
}

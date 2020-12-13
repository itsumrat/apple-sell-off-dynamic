<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Storage;
use Image;
use Intervention\Image\ImageManager;

class MainCategoryController extends Controller
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
        $maincategories = MainCategory::all();
        return view('backend.category.maincategory.index', compact('maincategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.maincategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug = Str::of($request->mc_name)->slug('_');

        MainCategory::create($request->except('mc_slug')+[
            'mc_slug' => $slug
        ]);

        Toastr::success('Main category successfully created:)','Success');
        return redirect()->route('maincategory.index');
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
        $maincategory = MainCategory::find($id);
        return view('backend.category.maincategory.edit', compact('maincategory'));
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
        $data = MainCategory::find($id);
        if (!empty($request->mc_name)) {
            $slug = Str::of($request->mc_name)->slug('_');
        }else {
            $slug = $data->mc_slug;
        }
        // maincategory info update
        $data = $data->update($request->except('mc_slug')+[
            'mc_slug' => $slug
        ]);

        Toastr::success('Main category successfully updated:)','Success');
        return redirect()->route('maincategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MainCategory::find($id);
        $oldFilename = $data->mc_icon;
        Storage::delete('/uploads/category/'. $oldFilename);
        $data->delete();
        
        Toastr::error('Main category successfully deleted:)','Deleted');
        return redirect()->route('maincategory.index');
    }
}

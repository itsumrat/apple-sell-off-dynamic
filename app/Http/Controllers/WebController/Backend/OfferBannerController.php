<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\OfferBanner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use Intervention\Image\ImageManager;
use Storage;

class OfferBannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $offerBanner = OfferBanner::latest()->paginate(5);
        return view('backend.offerbanner.index', compact('offerBanner'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offerBanner = OfferBanner::all();
        // dd($sliders);
        return view('backend.offerbanner.create', compact('offerBanner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($banner_img = $request->file('banner')) {
            $filename = rand(10, 100) . time().'.'.$banner_img->getClientOriginalExtension();
            $location = public_path('/uploads/offerbanner/'. $filename);
            Image::make($banner_img)->resize(650, 165)->save($location);

        }
        $data = OfferBanner::create($request->except('banner')+
            [
                'banner' => $filename,
            ]);

        Toastr::success('Offer Banner successfully created:)','Success');
        return redirect()->route('offerbanner.index');
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
        $offerBanner = OfferBanner::find($id);
            return view('backend.offerbanner.edit', compact('offerBanner'));
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
        $data = offerBanner::find($id);
        $banner_img = $data->banner;
        if ($image = $request->file('banner')) {
            $banner_img = rand(10, 100) . time().'.'.$image->getClientOriginalExtension();
            $location = public_path('/uploads/offerbanner/'. $banner_img);
            Image::make($image)->resize(1920, 450)->save($location);
            $oldFilename = $data->banner_img;
            $data->banner = $banner_img;
            Storage::delete('/uploads/offerbanner/'. $oldFilename);
        }
        // Slider info update
        $data = $data->update($request->except('banner')+
            [
            'banner_img' => $banner_img
            ]);

        Toastr::success('Slider successfully updated:)','Success');
        return redirect()->route('offerbanner.index');
    }
     // Status Update
     public function updateOfferStatus(Request $request)
     {
         $data = offerBanner::find($request->status);
             if ($data->status == 0) {
                 $data =  $data->update($request->except('status')+['status' => 1]);
             }else{
                 $data->status = 0;
                 $data->save();
             }
         return redirect()->route('offerbanner.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = offerBanner::find($id);
        $oldFilename = $data->banner;
        Storage::delete('/uploads/offerbanner/'. $oldFilename);
        $data->delete();
        Toastr::error('Offer Banner successfully deleted:)','Deleted');
        return redirect()->route('offerbanner.index');
    }
}

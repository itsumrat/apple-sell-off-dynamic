<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Backend\Color;
use App\Model\Backend\GraphicsCard;
use App\Model\Backend\HardDrive;
use App\Model\Backend\MainCategory;
use App\Model\Backend\OfferBanner;
use App\Model\Backend\Processor;
use App\Model\Backend\Product;
use App\Model\Backend\Ram;
use App\Model\Backend\Size;
use App\Model\Backend\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //Home Slider
    public function homeSlider()
    {
        $status = 200;
        $data = Slider::where('status', '=', 1)->orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    //Offer Banner
    public function offerBanner()
    {
        $status = 200;
        $data = OfferBanner::where('status', '=', 1)->orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // Main category with sub and child category show for sidebar menu
    public function mainCategoryMenu()
    {
        $status = 200;
        $data = MainCategory::with('subcategory.childcategory')->orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // show size for filtering
    public function getSizeFilter()
    {
        $status = 200;
        $data = Size::orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // show processor for filtering
    public function getProcessorFilter()
    {
        $status = 200;
        $data = Processor::orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // show ram for filtering
    public function getRamFilter()
    {
        $status = 200;
        $data = Ram::orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // show Hard drive for filtering
    public function getHarddriveFilter()
    {
        $status = 200;
        $data = HardDrive::orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }


    // show Graphics card for filtering
    public function getGraphicscardFilter()
    {
        $status = 200;
        $data = GraphicsCard::orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }


    // show colors for filtering
    public function getColorFilter()
    {
        $status = 200;
        $data = Color::orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // apple producs show in home page

    public function appleproducts()
    {
        $status = 200;
        $data = Product::with('mainCategory', 'proSize', 'proProcessor', 'proRam', 'proHarddrive', 'proGraphicscard', 'proColor', 'stockProduct', 'imageGalleryEdit')
        ->where('product_type_id', 1)
        ->orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // audio producs show in home page

    public function audioproducts()
    {
        $status = 200;
        $data = Product::with('mainCategory', 'proSize', 'proProcessor', 'proRam', 'proHarddrive', 'proGraphicscard', 'proColor', 'stockProduct', 'imageGalleryEdit')
        ->where('product_type_id', 2)
        ->orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // producs show in home page

    public function searchProducts($search)
    {
        $status = 200;
        $data = Product::withwith('mainCategory', 'proSize', 'proProcessor', 'proRam', 'proHarddrive', 'proGraphicscard', 'proColor', 'stockProduct', 'imageGalleryEdit')
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('id', 'ASC')->get();
        return response()->json($data, $status);
    }

    // show  single product
    public function singleProduct($id)
    {
        $status = 200;
        $data = Product::with(['mainCategory', 'proSize', 'proProcessor', 'proRam', 'proHarddrive', 'proGraphicscard', 'proColor', 'stockProduct', 'imageGalleryEdit','additional_ram.ram', 'additional_hard_drive.hard_drive', 'additional_graphics_card.graphics_card', 'additional_processor.processor', 'box_item'])->find($id);
        return response()->json($data, $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
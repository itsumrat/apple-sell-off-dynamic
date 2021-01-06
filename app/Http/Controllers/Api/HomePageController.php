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
use App\Model\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
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

    public function appleproducts(Request $request)
    {
        $data = Product::with('mainCategory', 'proSize', 'proProcessor', 'proRam',
            'proHarddrive', 'proGraphicscard', 'proColor', 'stockProduct', 'imageGalleryEdit')
        ->whereHas("stockProduct", function (Builder $query) use ($request) {
            return $query->whereBetween('product_stocks.unit_price', [$request->amount_from, $request->amount_to]);
        })->when($request->category, function ($query) use ($request) {
            $query->whereIn('main_category_id', explode(",", $request->category));
        })->when($request->size, function ($query) use ($request) {
            $query->whereIn('size_id', explode(",", $request->size));
        })->when($request->year, function ($query) use ($request) {
            $query->where('year', $request->year);
        })->when($request->processor, function ($query) use ($request) {
            $query->whereIn('processor_id', explode(",", $request->processor));
        })->when($request->ram, function ($query) use ($request) {
            $query->whereIn('ram_id', explode(",", $request->ram));
        })->when($request->hard_drive, function ($query) use ($request) {
            $query->whereIn('harddrive_id', explode(",", $request->hard_drive));
        })->when($request->graphics_card, function ($query) use ($request) {
            $query->whereIn('graphicscard_id', explode(",", $request->graphics_card));
        })->when($request->color, function ($query) use ($request) {
            $query->whereIn('color_id', explode(",", $request->color));
        })->when($request->stock, function ($query) use ($request) {
            $query->whereIn('stock_status', explode(",", $request->stock));
        })->when($request->condition, function ($query) use ($request) {
            $query->whereIn('condition', explode(",", $request->condition));
        })->when($request->product_filtering_option == 'best-selling', function ($query) use ($request) {
            $query->whereIn('id', OrderProduct::limit(100)->get()->pluck('product_id')->unique()->toArray());
        })->when($request->product_filtering_option == 'price-ascending', function ($query) use ($request) {
            $query->orderBy('product_stocks.unit_price', 'ASC');
        })->when($request->product_filtering_option == 'price-ascending', function ($query) use ($request) {
            $query->orderBy('product_stocks.unit_price', 'DESC');
        })->when($request->product_filtering_option == 'title-ascending', function ($query) use ($request) {
            $query->orderBy('name', 'ASC');
        })->when($request->product_filtering_option == 'title-descending', function ($query) use ($request) {
            $query->orderBy('name', 'DESC');
        })->when($request->product_filtering_option == 'created-descending', function ($query) use ($request) {
            $query->orderBy('created_at', 'DESC');
        })->when($request->product_filtering_option == 'created-ascending', function ($query) use ($request) {
            $query->orderBy('created_at', 'ASC');
        })->where('product_type_id', 1)->get();

        return response()->json($data, 200);
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
        $data = Product::with(['mainCategory', 'proSize', 'proProcessor', 'proRam', 'proHarddrive', 'proGraphicscard', 'proColor', 'stockProduct', 'imageGalleryEdit', 'additional_ram.ram', 'additional_hard_drive.hard_drive', 'additional_graphics_card.graphics_card', 'additional_processor.processor', 'box_item'])->find($id);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Color;
use App\Model\Backend\GraphicsCard;
use App\Model\Backend\HardDrive;
use App\Model\Backend\ImageGallery;
use App\Model\Backend\MainCategory;
use App\Model\Backend\Processor;
use App\Model\Backend\Product;
use App\Model\Backend\ProductAddition;
use App\Model\Backend\ProductBoxItem;
use App\Model\Backend\ProductStock;
use App\Model\Backend\ProductType;
use App\Model\Backend\Ram;
use App\Model\Backend\Size;
use App\Model\Backend\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use Intervention\Image\ImageManager;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('mainCategory', 'proSize', 'proProcessor', 'proRam', 'proHarddrive', 'proGraphicscard', 'proColor')->orderBy('id', 'DESC')->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttypes = ProductType::all();
        $maincategories = MainCategory::all();
        $sizes = Size::all();
        $processors = Processor::all();
        $rams = Ram::all();
        $harddrives = HardDrive::all();
        $graphicscards = GraphicsCard::all();
        $colors = Color::all();
        return view('backend.product.create', compact('producttypes', 'maincategories', 'sizes', 'processors', 'rams', 'harddrives', 'graphicscards', 'colors'));
    }

    public function getChildCategoy($id)
    {
        $childcategories = ChildCategory::where('sub_category_id', $id)->pluck('cc_name', 'id');
        return response()->json($childcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::of($request->name)->slug('_');
        // $tag = implode(',', $request->tag);

        $gfiles = $request->file('image_gallery');
        $gfile = $request->hasFile('image_gallery');

        if ($feature_image = $request->file('feature_image')) {
            $ffilename = rand(10, 100) . time() . '.' . $feature_image->getClientOriginalExtension();
            $flocation = public_path('/uploads/product/' . $ffilename);
            Image::make($feature_image)->resize(850, 480)->save($flocation);
        }

        DB::beginTransaction();
        try {
            $data = Product::create($request->except('create_user', 'update_user', 'product_owner', 'slug', 'feature_image') +
                [
                    'create_user' => Auth::id(),
                    'update_user' => Auth::id(),
                    'product_owner' => Auth::id(),
                    'slug' => $slug,
                    // 'tag' => $tag,
                    'feature_image' => $ffilename
                ]);
            if ($data) {
                if ($gfile != null) {
                    foreach ($gfiles as $file) {
                        $gfileimage = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
                        $glocationImage = public_path('/uploads/product/' . $gfileimage);
                        Image::make($file)->resize(850, 480)->save($glocationImage);
                        $imageGallery = new ImageGallery;
                        $imageGallery->product_id = $data->id;
                        $imageGallery->image_gallery = $gfileimage;
                        $imageGallery->save();
                    }
                }
                $stockProduct = ProductStock::create($request->except('product_id') +
                    [
                        'product_id' => $data->id
                    ]);


                if (count($request->additional_ram_id) > 0 && count($request->additional_ram_price) > 0) {
                    $additional_ram = array();
                    foreach ($request->additional_ram_id as $key => $value) {
                        if (isset($value) && isset($request->additional_ram_price[$key])) {
                            $additional_ram [] = [
                                'product_id' => $data->id,
                                'type' => 1, //1 = Ram
                                'addition_id' => $value,
                                'price' => $request->additional_ram_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::insert($additional_ram);
                }

                if (count($request->additional_hard_drive_id) > 0 && count($request->additional_hard_drive_price) > 0) {
                    $additional_hard_drive = array();
                    foreach ($request->additional_hard_drive_id as $key => $value) {
                        if (isset($value) && isset($request->additional_hard_drive_price[$key])) {
                            $additional_hard_drive [] = [
                                'product_id' => $data->id,
                                'type' => 2, //2 = hard_drive
                                'addition_id' => $value,
                                'price' => $request->additional_hard_drive_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::insert($additional_hard_drive);
                }

                if (count($request->additional_graphics_card_id) > 0 && count($request->additional_graphics_card_price) > 0) {
                    $additional_graphics_card = array();
                    foreach ($request->additional_graphics_card_id as $key => $value) {
                        if (isset($value) && isset($request->additional_graphics_card_price[$key])) {
                            $additional_graphics_card [] = [
                                'product_id' => $data->id,
                                'type' => 3, //3 = graphics_card
                                'addition_id' => $value,
                                'price' => $request->additional_graphics_card_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::insert($additional_graphics_card);
                }

                if (count($request->additional_processor_id) > 0 && count($request->additional_processor_price) > 0) {
                    $additional_processor = array();
                    foreach ($request->additional_processor_id as $key => $value) {
                        if (isset($value) && isset($request->additional_processor_price[$key])) {
                            $additional_processor [] = [
                                'product_id' => $data->id,
                                'type' => 4, //4 = processor
                                'addition_id' => $value,
                                'price' => $request->additional_processor_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::insert($additional_processor);
                }

                if (count($request->box_item_name) > 0 && count($request->box_item_image) > 0) {
                    $box_items = array();
                    foreach ($request->box_item_image as $key => $value) {
                        if (isset($value) && isset($request->box_item_name[$key])) {

                            $box_item_image = time() . $key . '.' . $value->getClientOriginalExtension();
                            $box_item_image_location = public_path('/uploads/product/' . $box_item_image);
                            Image::make($value)->resize(350, 350)->save($box_item_image_location);

                            $box_items [] = [
                                'product_id' => $data->id,
                                'name' => $request->box_item_name[$key],
                                'image' => $box_item_image,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductBoxItem::insert($box_items);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return response()->json($e);
        }
        Toastr::success('Product successfully created:)', 'Success');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $producttypes = ProductType::all();
        $maincategories = MainCategory::all();
        $sizes = Size::all();
        $processors = Processor::all();
        $rams = Ram::all();
        $harddrives = HardDrive::all();
        $graphicscards = GraphicsCard::all();
        $colors = Color::all();
        $product = Product::with(['stockEdit', 'imageGalleryEdit', 'additional_ram.ram', 'additional_hard_drive.hard_drive', 'additional_graphics_card.graphics_card', 'additional_processor.processor', 'box_item'])->find($id);
        return view('backend.product.edit', compact('product', 'producttypes', 'maincategories', 'sizes', 'processors', 'rams', 'harddrives', 'graphicscards', 'colors'));
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
        // $tag = implode(',', $request->tag);
        $data = Product::find($id);

        if (!empty($request->name)) {
            $slug = Str::of($request->name)->slug('_');
        } else {
            $slug = $data->slug;
        }

        // for Product image update
        $feature_image = $data->feature_image;
        if ($image = $request->file('feature_image')) {
            $feature_image = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/uploads/product/' . $feature_image);
            Image::make($image)->resize(850, 480)->save($location);
            $oldFilename = $data->feature_image;
            $data->feature_image = $feature_image;
            Storage::delete('/uploads/product/' . $oldFilename);
        }
        // product info update

        $gfiles = $request->file('image_gallery');
        $gfile = $request->hasFile('image_gallery');

        DB::beginTransaction();
        try {
            $data = $data->update($request->except('create_user', 'update_user', 'product_owner', 'slug', 'feature_image') +
                [
                    'create_user' => Auth::id(),
                    'update_user' => Auth::id(),
                    'product_owner' => Auth::id(),
                    'slug' => $slug,
                    // 'tag' => $tag,
                    'feature_image' => $feature_image
                ]);
            if ($data) {
                if ($gfile != null) {
                    foreach ($gfiles as $file) {
                        $gfileimage = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
                        $glocationImage = public_path('/uploads/product/' . $gfileimage);
                        Image::make($file)->resize(850, 480)->save($glocationImage);
                        $imageGallery = new ImageGallery;
                        $imageGallery->product_id = $id;
                        $imageGallery->image_gallery = $gfileimage;
                        $imageGallery->save();
                    }
                }
                $productStock = ProductStock::where('product_id', $id)->first();
                $productStock = $productStock->update($request->except('product_id') +
                    [
                        'product_id' => $id
                    ]);


                if (count($request->additional_ram_id) > 0 && count($request->additional_ram_price) > 0) {
                    $additional_ram = array();
                    foreach ($request->additional_ram_id as $key => $value) {
                        if (isset($value) && isset($request->additional_ram_price[$key])) {
                            $additional_ram [] = [
                                'product_id' => $id,
                                'type' => 1, //1 = Ram
                                'addition_id' => $value,
                                'price' => $request->additional_ram_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::where('product_id', $id)->where('type', 1)->delete();
                    ProductAddition::insert($additional_ram);
                }

                if (count($request->additional_hard_drive_id) > 0 && count($request->additional_hard_drive_price) > 0) {
                    $additional_hard_drive = array();
                    foreach ($request->additional_hard_drive_id as $key => $value) {
                        if (isset($value) && isset($request->additional_hard_drive_price[$key])) {
                            $additional_hard_drive [] = [
                                'product_id' => $id,
                                'type' => 2, //2 = hard_drive
                                'addition_id' => $value,
                                'price' => $request->additional_hard_drive_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::where('product_id', $id)->where('type', 2)->delete();
                    ProductAddition::insert($additional_hard_drive);
                }

                if (count($request->additional_graphics_card_id) > 0 && count($request->additional_graphics_card_price) > 0) {
                    $additional_graphics_card = array();
                    foreach ($request->additional_graphics_card_id as $key => $value) {
                        if (isset($value) && isset($request->additional_graphics_card_price[$key])) {
                            $additional_graphics_card [] = [
                                'product_id' => $id,
                                'type' => 3, //3 = graphics_card
                                'addition_id' => $value,
                                'price' => $request->additional_graphics_card_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::where('product_id', $id)->where('type', 3)->delete();
                    ProductAddition::insert($additional_graphics_card);
                }

                if (count($request->additional_processor_id) > 0 && count($request->additional_processor_price) > 0) {
                    $additional_processor = array();
                    foreach ($request->additional_processor_id as $key => $value) {
                        if (isset($value) && isset($request->additional_processor_price[$key])) {
                            $additional_processor [] = [
                                'product_id' => $id,
                                'type' => 4, //4 = processor
                                'addition_id' => $value,
                                'price' => $request->additional_processor_price[$key],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductAddition::where('product_id', $id)->where('type', 4)->delete();
                    ProductAddition::insert($additional_processor);
                }

                if (count($request->box_item_name) > 0 && count($request->box_item_image) > 0) {
                    $box_items = array();
                    foreach ($request->box_item_image as $key => $value) {
                        if (isset($value) && isset($request->box_item_name[$key])) {

                            if (gettype($request->box_item_image[$key]) != "string") {
                                $box_item_image = time() . $key . '.' . $value->getClientOriginalExtension();
                                $box_item_image_location = public_path('/uploads/product/' . $box_item_image);
                                Image::make($value)->resize(350, 350)->save($box_item_image_location);
                            } else {
                                $box_item_image = $value;
                            }

                            $box_items [] = [
                                'product_id' => $id,
                                'name' => $request->box_item_name[$key],
                                'image' => $box_item_image,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                        }
                    }
                    ProductBoxItem::where('product_id', $id)->delete();
                    ProductBoxItem::insert($box_items);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return response()->json($e);
        }
        Toastr::success('Product successfully updated:)', 'Success');
        return redirect()->route('products.index');
    }

    public function deleteImageGallery($proId, $imgId)
    {
        $getImage = ImageGallery::where('id', $imgId)
            ->where('product_id', $proId)
            ->first();

        $oldFilename = $getImage->image_gallery;
        Storage::delete('/uploads/product/' . $oldFilename);
        $getImage->delete();
        return response()->json($getImage);

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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Backend\FaqsCategory;
use App\Model\Backend\FaqsSetting;
use App\Model\Backend\GeneralSetting;
use App\Model\Backend\MainCategory;
use App\Model\Backend\Product;
use App\Model\Backend\SubCategory;
use App\Model\Backend\ChildCategory;
use App\Model\HomePageSetting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //Sub Category
    public function subCategory($id)
    {
        $status = 200;
        $data = SubCategory::with('mainCategoryForSub')->where('main_category_id', $id)->get();
        return response()->json($data, $status);
    }

    //Child Category
    public function childCategory($id, $mainCat)
    {
        $status = 200;
        $data = ChildCategory::with('mainCategoryForChild', 'subCategoryForChild')->where('main_category_id', $mainCat)->where('sub_category_id', $id)->get();
        return response()->json($data, $status);
    }

    public function home_page_setting()
    {
        return response()->json(HomePageSetting::first());
    }

    public function general_setting()
    {
        return response()->json(GeneralSetting::first());
    }

    public function faqs_setting()
    {
        return response()->json(FaqsCategory::with('faqs_setting')->get());
    }

    public function suggested_product()
    {
        return response()->json(Product::whereIsSuggestable(1)->with('stockProduct')->get());
    }

    public function categories_product()
    {
        $data = MainCategory::with('product.stock_product:id,product_id,unit_price')->get();
        return response()->json($data);
    }

    public function add_to_cart(Request $request) {
        $processor = '';
        $ram = '';
        $hard_drive = '';
        $graphics_card = '';

        if (!empty($request->price_array)) {
            foreach ($request->price_array as $key =>  $value) {
                if ($value['device_type'] == 1) {
                    $ram = $value['id'];
                }
                if ($value['device_type'] == 2) {
                    $hard_drive = $value['id'];
                }
                if ($value['device_type'] == 3) {
                    $graphics_card = $value['id'];
                }
                if ($value['device_type'] == 4) {
                    $processor = $value['id'];
                }
            }
        }
        \Cart::add( array(
            array(
                'id' => $request->id . $processor . $ram . $hard_drive . $graphics_card,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $request->feature_image,
                    'product_id' => $request->id,
                    'processor' => $processor,
                    'ram' => $ram,
                    'hard_drive' => $hard_drive,
                    'graphics_card' => $graphics_card,
                )
            ),
        ));
        $data = ['data' => \Cart::getContent(), 'cart_count' => \Cart::getContent()->count(), 'total' => \Cart::getTotal()];
        return response()->json($data);
    }

    public function cart_list() {
        $data = ['data' => \Cart::getContent(), 'cart_count' => \Cart::getContent()->count(), 'total' => \Cart::getTotal()];
        return response()->json($data);
    }

    public function remove_cart_item($id) {
        \Cart::remove($id);
        $data = ['data' => \Cart::getContent(), 'cart_count' => \Cart::getContent()->count(), 'total' => \Cart::getTotal()];
        return response()->json($data);
    }

    public function increase_quantity($id, $type) {
        \Cart::update($id, array(
            'quantity' => $type == 'increase' ? 1 : -1,
        ));

        $data = ['data' => \Cart::getContent(), 'cart_count' => \Cart::getContent()->count(), 'total' => \Cart::getTotal()];
        return response()->json($data);
    }
}

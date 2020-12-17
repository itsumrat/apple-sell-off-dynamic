<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function suggested_product()
    {
        return response()->json(Product::whereIsSuggestable(1)->with('stockProduct')->get());
    }

    public function categories_product()
    {
        $data = MainCategory::with('product.stock_product:id,product_id,unit_price')->get();
        return response()->json($data);
    }
}

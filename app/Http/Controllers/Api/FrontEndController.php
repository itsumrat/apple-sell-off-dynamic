<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Backend\MainCategory;
use App\Model\Backend\SubCategory;
use App\Model\Backend\ChildCategory;
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
}

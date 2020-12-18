<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\FaqsCategory;
use App\Model\Backend\FaqsSetting;
use Illuminate\Http\Request;
use Validator;

class FaqsSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = FaqsCategory::all();
        $category_array = array();
        $category_array[''] = 'Select Category';
        foreach ($category as $value) {
            $category_array[$value->id] = $value->name;
        }

        $data = FaqsSetting::with('faqs_category')->get();
        return view('backend.faq.faqs_setting', compact('data', 'category_array'));
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
        $data = new FaqsSetting;
        Validator::make($request->all(), $data->validation())->validate();

        $data->fill($request->all())->save();
        return back()->with(['success' => 'FaqsSetting Created Successfully!']);
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
        $category = FaqsCategory::all();
        $category_array = array();
        $category_array[''] = 'Select Category';
        foreach ($category as $value) {
            $category_array[$value->id] = $value->name;
        }

        $data = FaqsSetting::findOrFail($id);
        return view('backend.faq.edit_faqs_setting', compact('data', 'category_array'));
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
        $data = FaqsSetting::findOrFail($id);
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails())  {
            return back()->withInput()->withErrors($validate);
        }
        $data->fill($request->all())->save();
        return back()->with(['success' => 'FaqsSetting Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FaqsSetting::findOrFail($id)->delete();
        return back()->with(['success' => 'FaqsSetting Deleted Successfully!']);
    }
}

<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\FaqsCategory;
use Illuminate\Http\Request;
use Validator;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FaqsCategory::all();
        return view('backend.faq.faq_category', compact('data'));
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
        $data = new FaqsCategory;
        $validate = Validator::make($request->all(), $data->validation())->validate();

        $data->fill($request->all())->save();
        return back()->with(['success' => 'FaqsCategory Created Successfully!']);
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
        $data = FaqsCategory::findOrFail($id);
        return view('backend.faq.edit_faq_category', compact('data'));
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
        $data = FaqsCategory::findOrFail($id);
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails())  {
            return back()->withInput()->withErrors($validate);
        }
        $data->fill($request->all())->save();
        return back()->with(['success' => 'FaqsCategory Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FaqsCategory::findOrFail($id)->delete();
        return back()->with(['success' => 'FaqsCategory Deleted Successfully!']);
    }
}

<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\HomePageSetting;
use Illuminate\Http\Request;
use File;
use Validator;

class HomePageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomePageSetting::first();
        return view('backend.home_page_setting', compact('data'));
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
        $requested_data = $request->all();
        $data = HomePageSetting::findOrFail($id);
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails())  {
            return back()->withInput()->withErrors($validate);
        }

        if($request->hasFile('first_sec_image_1')){
            $requested_data['first_sec_image_1'] = $this->image_upload($request->file('first_sec_image_1'), $data, 'first_sec_image_1');
        }

        if($request->hasFile('first_sec_image_2')){
            $requested_data['first_sec_image_2'] = $this->image_upload($request->file('first_sec_image_2'), $data, 'first_sec_image_2');
        }

        if($request->hasFile('first_sec_image_3')){
            $requested_data['first_sec_image_3'] = $this->image_upload($request->file('first_sec_image_3'), $data, 'first_sec_image_3');
        }

        if($request->hasFile('first_sec_image_4')){
            $requested_data['first_sec_image_4'] = $this->image_upload($request->file('first_sec_image_4'), $data, 'first_sec_image_4');
        }

        if($request->hasFile('third_sec_image')){
            $requested_data['third_sec_image'] = $this->image_upload($request->file('third_sec_image'), $data, 'third_sec_image');
        }

        if($request->hasFile('four_sec_image_1')){
            $requested_data['four_sec_image_1'] = $this->image_upload($request->file('four_sec_image_1'), $data, 'four_sec_image_1');
        }

        if($request->hasFile('four_sec_image_2')){
            $requested_data['four_sec_image_2'] = $this->image_upload($request->file('four_sec_image_2'), $data, 'four_sec_image_2');
        }

        if($request->hasFile('four_sec_image_3')){
            $requested_data['four_sec_image_3'] = $this->image_upload($request->file('four_sec_image_3'), $data, 'four_sec_image_3');
        }

        if($request->hasFile('fifth_sec_image')){
            $requested_data['fifth_sec_image'] = $this->image_upload($request->file('fifth_sec_image'), $data, 'fifth_sec_image');
        }

        $data->fill($requested_data)->save();
        return back();
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

    public function image_upload($file, $data, $field){
        $uploadPath = 'backend/img/home_page_setting/';
        $name = $uploadPath.time().'_'.$field.'.'.$file->getClientOriginalExtension();
        $file->move($uploadPath,$name);

        if (File::exists(asset($data->first_sec_image_1))) {
            File::delete(asset($data->first_sec_image_1));
        }
        return $name;
    }
}

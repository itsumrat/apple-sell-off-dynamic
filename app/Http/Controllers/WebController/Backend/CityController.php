<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Region;
use App\Model\Backend\City;
use Brian2694\Toastr\Facades\Toastr;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //City index
        $cities  = City::with('regionForCity')->get();
        return view('backend.location.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //City Create
        $region = Region::all();
        return view('backend.location.city.create', compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // City Stores 
         request()->validate([
            'region_id'     => 'required',
            'name'          => 'required',
            'shipping_rate' => 'required',
        ]);

        City::create($request->all());
        Toastr::success('City successfully created:)','Success');
        return redirect()->route('city.index');

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
        //City Edit
        $region = Region::all();
        $city   = City::find($id);
        return view('backend.location.city.edit', compact('region', 'city'));
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
        //City Update
        $city = City::find($id);
        $city = $city->update($request->all());
        Toastr::success('City successfully updated:)','Success');
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //City delete
        $city = City::find($id);
        $city->delete();
        Toastr::error('City successfully deleted:)','Deleted');
        return redirect()->route('city.index');
    }
}

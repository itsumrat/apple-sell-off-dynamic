<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Region;
use App\Model\Backend\City;
use App\Model\Backend\Area;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        // Area index
        $areies  = Area::with('regionForArea', 'cityForArea')->get();
        return view('backend.location.area.index', compact('areies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Area Create
        $region = Region::all();
        $city = City::all();
        return view('backend.location.area.create', compact('city', 'region'));
    }


     public function getCity($id)
     {
        $city = City::where('region_id', $id)->pluck('name', 'id');
        return json_encode($city);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Area Store
        request()->validate([
            'region_id' => 'required',
            'city_id' => 'required',
            'name' => 'required',
        ]);

        Area::create($request->all());
        Toastr::success('City successfully created:)','Success');
        return redirect()->route('area.index');
    
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
        // Area edit
        $region  = Region::all();
        $city    = City::all();
        $area    = Area::find($id);
        return view('backend.location.area.edit', compact('area', 'region', 'city'));
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
        // Area update
        $area = Area::find($id);
        $area = $area->update($request->all());
        Toastr::success('Area category successfully updated:)','Success');
        return redirect()->route('area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Area delete
        $area = Area::find($id);
        $area->delete();
        Toastr::error('Area category successfully deleted:)','Deleted');
        return redirect()->route('area.index');
    }
}

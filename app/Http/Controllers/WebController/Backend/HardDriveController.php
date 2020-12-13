<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\HardDrive;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HardDriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harddrives = HardDrive::orderBy('id', 'DESC')->get();
        return view('backend.harddrive.index', compact('harddrives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.harddrive.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HardDrive::create($request->all());
        Toastr::success('Hard drive successfully created:)','Success');
        return redirect()->route('harddrives.index');
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
        $harddrive = HardDrive::find($id);
        return view('backend.harddrive.edit', compact('harddrive'));
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
        $harddrive = HardDrive::find($request->id);
        $harddrive->update($request->all());
        Toastr::success('Hard drive successfully updated:)','Success');
        return redirect()->route('harddrives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $harddrive = HardDrive::find($id)->delete();
        Toastr::error('Hard drive successfully deleted:)','Success');
        return redirect()->route('harddrives.index');
    }
}

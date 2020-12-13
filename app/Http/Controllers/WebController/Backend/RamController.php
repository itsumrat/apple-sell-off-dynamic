<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Ram;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class RamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rams = Ram::orderBy('id', 'DESC')->get();
        return view('backend.ram.index', compact('rams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ram.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ram::create($request->all());
        Toastr::success('Ram successfully created:)','Success');
        return redirect()->route('rams.index');
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
        $ram = Ram::find($id);
        return view('backend.ram.edit', compact('ram'));
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
        $ram = Ram::find($request->id);
        $ram->update($request->all());
        Toastr::success('Ram successfully updated:)','Success');
        return redirect()->route('rams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ram = Ram::find($id)->delete();
        Toastr::error('Ram successfully deleted:)','Success');
        return redirect()->route('rams.index');
    }
}

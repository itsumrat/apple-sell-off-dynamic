<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Size;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::orderBy('id', 'DESC')->get();
        return view('backend.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @pasize  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Size::create($request->all());
        Toastr::success('Size successfully created:)','Success');
        return redirect()->route('sizes.index');
    }

    /**
     * Display the specified resource.
     *
     * @pasize  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @pasize  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::find($id);
        return view('backend.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @pasize  \Illuminate\Http\Request  $request
     * @pasize  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $size = Size::find($request->id);
        $size->update($request->all());
        Toastr::success('Size successfully updated:)','Success');
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @pasize  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id)->delete();
        Toastr::error('Size successfully deleted:)','Success');
        return redirect()->route('sizes.index');
    }
}

<?php

namespace App\Http\Controllers\WebController\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\GraphicsCard;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class GraphicsCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graphicscards = GraphicsCard::orderBy('id', 'DESC')->get();
        return view('backend.graphicscard.index', compact('graphicscards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.graphicscard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GraphicsCard::create($request->all());
        Toastr::success('Graphics card successfully created:)','Success');
        return redirect()->route('graphicscards.index');
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
        $graphicscard = GraphicsCard::find($id);
        return view('backend.graphicscard.edit', compact('graphicscard'));
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
        $graphicscard = GraphicsCard::find($request->id);
        $graphicscard->update($request->all());
        Toastr::success('Graphics card successfully updated:)','Success');
        return redirect()->route('graphicscards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $graphicscard = GraphicsCard::find($id)->delete();
        Toastr::error('Graphics card successfully deleted:)','Success');
        return redirect()->route('graphicscards.index');
    }
}

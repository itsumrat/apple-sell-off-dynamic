@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('products.index') }}">
                <i aria-hidden="true" class="fas fa-sign-out-alt fa-sm fa-fw mr-2">
                </i>
                Back
            </a>
        </h6>
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>
                Whoops!
            </strong>
            There were some problems with your input.
            <br>
                <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </br>
            </br>
        </div>
        @endif
         <form action="{{route('products.update', $product->id)}}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{ $product->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">
                                    Product Name
                                </label>
                                <input class="form-control" id="name" name="name" type="text" required="" value="{{ $product->name }}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="product_description">
                                    Product Description
                                </label>
                                <textarea class="form-control" cols="30" id="product_description" name="product_description" rows="4" value="{{ $product->product_description }}">{{ $product->product_description }}
                                </textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label for="product_specification">
                                    Competitions Details
                                </label>
                                <textarea class="form-control" cols="30" id="product_specification" name="product_specification" rows="4" value="{{ $product->product_specification }}">{{ $product->product_specification }}
                                </textarea>
                            </div> --}}

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_price">
                                        Unit Price
                                    </label>
                                    <input class="form-control" name="unit_price" id="unit_price" placeholder="Unit Price" type="number" required="" value="{{ $product->stockEdit->unit_price }}">
                                    </input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="purchase_price">
                                        Purchase Price
                                    </label>
                                    <input class="form-control" name="purchase_price" id="purchase_price" placeholder="Purchase Price" type="number" value="{{ $product->stockEdit->purchase_price }}">
                                    </input>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tax">
                                        Tax
                                    </label>
                                    <input class="form-control" name="tax" id="tax" placeholder="Tax" type="number" value="{{ $product->stockEdit->tax }}">
                                    </input>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="discount">
                                        Discount
                                    </label>
                                    <input class="form-control" name="discount" id="discount" placeholder="Discount" type="number" value="{{ $product->stockEdit->discount }}">
                                    </input>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stock_quantity">
                                        Stock Quantity
                                    </label>
                                    <input class="form-control" name="stock_quantity" id="stock_quantity" placeholder="Stock Quantity" type="number" value="{{ $product->stockEdit->stock_quantity }}">
                                    </input>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="feature_image">
                                        Feature Image
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="feature_image">
                                            </div>
                                            <div style="margin-left: 13px;">
                                                <img src="{{asset('/uploads/product/' . $product->feature_image)}}" class="img img-fluid img-thumbnail" height="50" width="45">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="image_gallery">
                                        Gallery Image
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="image_gallery">
                                            </div>
                                            <div>
                                                <table>
                                                    <thead>
                                                        @foreach($product->imageGalleryEdit as $gallery)
                                                        <tr>
                                                            <th>
                                                                <img src="{{asset('/uploads/product/' . $gallery->image_gallery)}}" class="img img-fluid img-thumbnail" height="50" width="45">
                                                            </th>
                                                            <th>
                                                               <input class="btn btn-sm btn-danger delete-image" id="delete-image" data-id="{{ $gallery->id }}" data-pro="{{ $product->id }}" value="X">
                                                            </th>
                                                        </tr>
                                                        @endforeach
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="feature_image">
                                        Additional
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs tabs-dark bg-light" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="ram-tab" data-toggle="tab" href="#ram" role="tab" aria-controls="ram" aria-selected="true">Ram</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hard_drive-tab" data-toggle="tab" href="#hard_drive" role="tab" aria-controls="hard_drive" aria-selected="false">Hard Drive</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="graphics_card-tab" data-toggle="tab" href="#graphics_card" role="tab" aria-controls="graphics_card" aria-selected="false">Graphics Card</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="processor-tab" data-toggle="tab" href="#processor" role="tab" aria-controls="processor" aria-selected="false">Processor</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="ram" role="tabpanel" aria-labelledby="ram-tab">
                                                    @if(count($product->additional_ram) > 0)
                                                        @foreach($product->additional_ram as $key => $value)
                                                            <div class="row">
                                                                    <div class="col-lg-5">
                                                                        <div class="form-group">
                                                                            <label> Ram </label>
                                                                            <select class="form-control" name="additional_ram_id[]">
                                                                                @foreach($rams as $ram)
                                                                                    <option @if($value->addition_id == $ram->id) selected @endif value="{{ $ram->id }}">{{ $ram->ram_size }} {{ $ram->ram_sign }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <div class="form-group">
                                                                            <label> Price </label>
                                                                            <input class="form-control" value="{{ $value->price }}" name="additional_ram_price[]" type="number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="form-group">
                                                                            <label> Action </label>
                                                                            @if($key == 0)
                                                                                <button id="additional_ram_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                                            @else
                                                                                <button id="additional_ram_remove" type="button" class="btn btn-danger btn-sm">REM</button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @endforeach
                                                    @else
                                                        <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label> Ram </label>
                                                                <select class="form-control" name="additional_ram_id[]">
                                                                    <option>Select One</option>
                                                                    @foreach($rams as $ram)
                                                                        <option value="{{ $ram->id }}">{{ $ram->ram_size }} {{ $ram->ram_sign }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label> Price </label>
                                                                <input class="form-control" name="additional_ram_price[]" type="number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label> Action </label>
                                                                <button id="additional_ram_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="tab-pane fade" id="hard_drive" role="tabpanel" aria-labelledby="hard_drive-tab">
                                                    @if(count($product->additional_hard_drive) > 0)
                                                        @foreach($product->additional_hard_drive as $key => $value)
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label> Hard Drive </label>
                                                                        <select class="form-control" name="additional_hard_drive_id[]">
                                                                            @foreach($harddrives as $harddrive)
                                                                                <option @if($value->addition_id == $harddrive->id) selected @endif value="{{ $harddrive->id }}">{{ $harddrive->hard_drive_size }} {{ $harddrive->hard_drive_sign }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label> Price </label>
                                                                        <input class="form-control" value="{{ $value->price }}" name="additional_hard_drive_price[]" type="number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">
                                                                        <label> Action </label>
                                                                        @if($key == 0)
                                                                            <button id="additional_hard_drive_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                                        @else
                                                                            <button id="additional_hard_drive_remove" type="button" class="btn btn-danger btn-sm">REM</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label> Hard Drive </label>
                                                                <select class="form-control" name="additional_hard_drive_id[]">
                                                                    <option>Select One</option>
                                                                    @foreach($harddrives as $harddrive)
                                                                        <option value="{{ $harddrive->id }}">{{ $harddrive->hard_drive_size }} {{ $harddrive->hard_drive_sign }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label> Price </label>
                                                                <input class="form-control" name="additional_hard_drive_price[]" type="number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label> Action </label>
                                                                <button id="additional_hard_drive_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="tab-pane fade" id="graphics_card" role="tabpanel" aria-labelledby="graphics_card-tab">
                                                    @if(count($product->additional_graphics_card) > 0)
                                                        @foreach($product->additional_graphics_card as $key => $value)
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label> Graphics Card </label>
                                                                        <select class="form-control" name="additional_graphics_card_id[]">
                                                                            @foreach($graphicscards as $graphicscard)
                                                                                <option @if($value->addition_id == $graphicscard->id) selected @endif value="{{ $graphicscard->id }}">{{ $graphicscard->graphics_card_size }} {{ $graphicscard->graphics_card_sign }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label> Price </label>
                                                                        <input class="form-control" value="{{ $value->price }}" name="additional_graphics_card_price[]" type="number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">
                                                                        <label> Action </label>
                                                                        @if($key == 0)
                                                                            <button id="additional_graphics_card_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                                        @else
                                                                            <button id="additional_graphics_card_remove" type="button" class="btn btn-danger btn-sm">REM</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label> Graphics Card </label>
                                                                    <select class="form-control" name="additional_graphics_card_id[]">
                                                                        <option>Select One</option>
                                                                        @foreach($graphicscards as $graphicscard)
                                                                            <option value="{{ $graphicscard->id }}">{{ $graphicscard->graphics_card_size }} {{ $graphicscard->graphics_card_sign }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label> Price </label>
                                                                    <input class="form-control" name="additional_graphics_card_price[]" type="number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label> Action </label>
                                                                    <button id="additional_graphics_card_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="tab-pane fade" id="processor" role="tabpanel" aria-labelledby="processor-tab">
                                                    @if(count($product->additional_processor) > 0)
                                                        @foreach($product->additional_processor as $key => $value)
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label> Processor </label>
                                                                        <select class="form-control" name="additional_processor_id[]">
                                                                            @foreach($processors as $processor)
                                                                                <option @if($value->addition_id == $processor->id) selected @endif value="{{ $processor->id }}">{{ $processor->processors_type }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label> Price </label>
                                                                        <input class="form-control" value="{{ $value->price }}" name="additional_processor_price[]" type="number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">
                                                                        <label> Action </label>
                                                                        @if($key == 0)
                                                                            <button id="additional_processor_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                                        @else
                                                                            <button id="additional_processor_remove" type="button" class="btn btn-danger btn-sm">REM</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label> Processor </label>
                                                                <select class="form-control" name="additional_processor_id[]">
                                                                    <option>Select One</option>
                                                                    @foreach($processors as $processor)
                                                                        <option value="{{ $processor->id }}">{{ $processor->processors_type }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label> Price </label>
                                                                <input class="form-control" name="additional_processor_price[]" type="number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label> Action </label>
                                                                <button id="additional_processor_add" type="button" class="btn btn-success btn-sm">ADD</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="feature_image">
                                        Box Items
                                    </label>
                                    <div id="box_item">
                                        @forelse($product->box_item as $key => $value)
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label> Name </label>
                                                        <input class="form-control" name="box_item_name[]" type="text" value="{{ $value->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label> Image </label>
                                                        <input type="hidden" name="box_item_image[]" value="{{ $value->image }}">
                                                        <input class="form-control" name="box_item_image[]" type="file">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label> Action </label>
                                                        @if($key == 0)
                                                        <button type="button" id="box_item_add" class="btn btn-success btn-sm">ADD</button>
                                                        @else
                                                        <button type="button" class="btn btn-danger btn-sm box_item_remove">REM</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label> Name </label>
                                                        <input class="form-control" name="box_item_name[]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label> Image </label>
                                                        <input class="form-control" name="box_item_image[]" type="file">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label> Action </label>
                                                        <button type="button" id="box_item_add" class="btn btn-success btn-sm">ADD</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="product_type_id">
                                    Product Type
                                </label>
                                <select class="form-control" id="product_type_id" name="product_type_id">
                                    <option>Select One</option>
                                    @foreach($producttypes as $producttype)
                                        <option value="{{ $producttype->id }}" {{ $producttype->id == $product->product_type_id ? 'selected' : '' }}>{{ $producttype->product_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="main_category_id">
                                    Category
                                </label>
                                <select class="form-control" id="main_category_id" name="main_category_id">
                                    <option>Select One</option>
                                    @foreach($maincategories as $maincategory)
                                        <option value="{{ $maincategory->id }}" {{ $maincategory->id == $product->main_category_id ? 'selected' : '' }}>{{ $maincategory->mc_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="size_id">
                                    Size
                                </label>
                                <select class="form-control" id="size_id" name="size_id">
                                    <option>Select One</option>
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}" {{ $size->id == $product->size_id ? 'selected' : '' }}>{{ $size->size }} {{ $size->size_sign }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="processor_id">
                                    Processor
                                </label>
                                <select class="form-control" id="processor_id" name="processor_id">
                                    <option>Select One</option>
                                    @foreach($processors as $processor)
                                        <option value="{{ $processor->id }}" {{ $processor->id == $product->processor_id ? 'selected' : '' }}>{{ $processor->processors_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ram_id">
                                    Ram
                                </label>
                                <select class="form-control" id="ram_id" name="ram_id">
                                    <option>Select One</option>
                                    @foreach($rams as $ram)
                                        <option value="{{ $ram->id }}" {{ $ram->id == $product->ram_id ? 'selected' : '' }}>{{ $ram->ram_size }} {{ $ram->ram_sign }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harddrive_id">
                                    Hard drive
                                </label>
                                <select class="form-control" id="harddrive_id" name="harddrive_id" required="">
                                    <option>Select One</option>
                                    @foreach($harddrives as $harddrive)
                                        <option value="{{ $harddrive->id }}" {{ $harddrive->id == $product->harddrive_id ? 'selected' : '' }}>{{ $harddrive->hard_drive_size }} {{ $harddrive->hard_drive_sign }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="graphicscard_id">
                                   Graphics cards
                                </label>
                                <select class="form-control" id="graphicscard_id" name="graphicscard_id" required="">
                                    <option>Select One</option>
                                    @foreach($graphicscards as $graphicscard)
                                        <option value="{{ $graphicscard->id }}" {{ $graphicscard->id == $product->graphicscard_id ? 'selected' : '' }}>{{ $graphicscard->graphics_card_size }} {{ $graphicscard->graphics_card_sign }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="color_id">
                                   Color
                                </label>
                                <select class="form-control" id="color_id" name="color_id" required="">
                                    <option>Select One</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}" {{ $color->id == $product->color_id ? 'selected' : '' }}>{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stock_status">
                                    Stock Status
                                </label>
                                <select class="form-control" id="stock_status" name="stock_status" required="">
                                    <option>Select One</option>
                                    <option value="1" {{ $product->stock_status == 1 ? 'selected' : '' }}>In Stock</option>
                                    <option value="2" {{ $product->stock_status == 2 ? 'selected' : '' }}>Coming Soon</option>
                                    <option value="0" {{ $product->stock_status == 0 ? 'selected' : '' }}>Sold Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="condition">
                                    Condition
                                </label>
                                <select class="form-control" id="condition" name="condition" required="">
                                    <option>Select One</option>
                                    <option value="1" {{ $product->condition == 1 ? 'selected' : '' }}>New</option>
                                    <option value="2" {{ $product->condition == 2 ? 'selected' : '' }}>Used</option>
                                    <option value="0" {{ $product->condition == 0 ? 'selected' : '' }}>Approved Used</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year">
                                    Year
                                </label>
                                <select id="year" name="year" class="form-control ">
                                    {{ $last= date('Y')-10 }}
                                    {{ $now = date('Y')+10 }}

                                    @for ($i = $last; $i <= $now; $i++)
                                        <option value="{{ $i }}" {{ $i == $product->year ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="is_suggestable" class="form-check-input" id="is_suggestable" value="1" @if($product->is_suggestable == 1) checked @endif>
                                <label class="form-check-label" for="is_suggestable">Check Here for Suggest this product.</label>
                            </div>
                            {{-- <div class="form-group">
                                <label for="tag">
                                    Prduct Tag
                                </label>
                                <input class="form-control" id="tag" name="tag[]" data-role="tagsinput" type="text" value="{{ $product->tag }}">
                                </input>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" style="margin-top: 15px;" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      padding: 2px;
      color: white;
      background-color: #37a16f;
      border-radius: 3px;
    }

    span.tag.label.label-info {
        padding: 2px;
        font-weight: 600;
    }
    .bootstrap-tagsinput {
        width: 100% !important;
    }
    input#delete-image {
        width: 20%;
        padding: 2px;
        font-size: 12px;
        font-weight: 900;
    }
</style>
@endsection
@section('script')

<script src="{{ asset('js/spartan-multi-image-picker-min.js') }}">
</script>
<script>
    tinymce.init({
     selector: 'textarea#product_description'
   });
    tinymce.init({
     selector: 'textarea#product_specification'
   });
    $(document).ready(function(){
        $("#image_gallery").spartanMultiImagePicker({
            fieldName:        'image_gallery[]',
            maxCount:         4,
            rowHeight:        '100px',
            groupClassName:   'col-md-2 float-left',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#feature_image").spartanMultiImagePicker({
            fieldName:        'feature_image',
            maxCount:         1,
            rowHeight:        '100px',
            groupClassName:   'col-md-12 col-sm-12 col-xs-12',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });

      $('.delete-image').on('click', function(){
            var proId = $(this).attr('data-pro');
            var imgId = $(this).attr('data-id');
            $.ajax({
                url: "/deleteImageGallery/"+ proId +"/"+ imgId,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    location.reload();
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
    $('#tag').tagsinput({
      maxTags: 5,
      tagClass: 'tagstyle'
    });

    $('#meta_tag').tagsinput({
      maxTags: 5
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        //Ram
        $(document).on('click', '#additional_ram_add', function () {
            $('#ram').append(`<div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label> Ram </label>
                                            <select class="form-control" name="additional_ram_id[]">
                                                <option>Select One</option>
                                                @foreach($rams as $ram)
            <option value="{{ $ram->id }}">{{ $ram->ram_size }} {{ $ram->ram_sign }}</option>
                                                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label> Price </label>
            <input class="form-control" name="additional_ram_price[]" type="number">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label> Action </label>
            <button type="button" id="additional_ram_remove" class="btn btn-danger btn-sm">REM</button>
        </div>
    </div>
</div>`)
        })
        $(document).on('click', '#additional_ram_remove', function () {
            $(this).parent().parent().parent().remove();
        })

        //Hard Drive
        $(document).on('click', '#additional_hard_drive_add', function () {
            $('#hard_drive').append(`<div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label> Hard Drive </label>
                                            <select class="form-control" name="additional_hard_drive_id[]">
                                                <option>Select One</option>
                                                @foreach($harddrives as $harddrive)
                                                <option value="{{ $harddrive->id }}">{{ $harddrive->hard_drive_size }} {{ $harddrive->hard_drive_sign }}</option>
                                                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label> Price </label>
                                                <input class="form-control" name="additional_hard_drive_price[]" type="number">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label> Action </label>
                                                <button type="button" id="additional_hard_drive_remove" class="btn btn-danger btn-sm">REM</button>
                                            </div>
                                        </div>
                                    </div>`)
        })
        $(document).on('click', '#additional_hard_drive_remove', function () {
            $(this).parent().parent().parent().remove();
        })

        //Ram
        $(document).on('click', '#additional_graphics_card_add', function () {
            $('#graphics_card').append(`<div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label> Ram </label>
                                            <select class="form-control" name="additional_graphics_card_id[]">
                                                <option>Select One</option>
                                                @foreach($graphicscards as $graphicscard)
            <option value="{{ $graphicscard->id }}">{{ $graphicscard->graphics_card_size }} {{ $graphicscard->graphics_card_sign }}</option>
                                                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label> Price </label>
            <input class="form-control" name="additional_graphics_card_price[]" type="number">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label> Action </label>
            <button type="button" id="additional_graphics_card_remove" class="btn btn-danger btn-sm">REM</button>
        </div>
    </div>
</div>`)
        })
        $(document).on('click', '#additional_graphics_card_remove', function () {
            $(this).parent().parent().parent().remove();
        })

        //processor
        $(document).on('click', '#additional_processor_add', function () {
            $('#processor').append(`<div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label> Processor </label>
                                            <select class="form-control" name="additional_processor_id[]">
                                                <option>Select One</option>
                                                @foreach($processors as $processor)
                                                <option value="{{ $processor->id }}">{{ $processor->processors_type }}</option>
                                                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label> Price </label>
                                                <input class="form-control" name="additional_processor_price[]" type="number">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label> Action </label>
                                                <button type="button" id="additional_processor_remove" class="btn btn-danger btn-sm">REM</button>
                                            </div>
                                        </div>
                                    </div>`)
        })
        $(document).on('click', '#additional_processor_remove', function () {
            $(this).parent().parent().parent().remove();
        })


        //box_item
        $(document).on('click', '#box_item_add', function () {
            $('#box_item').append(`<div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> Name </label>
                                                    <input class="form-control" name="box_item_name[]" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> Image </label>
                                                    <input class="form-control" name="box_item_image[]" type="file">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label> Action </label>
                                                    <button type="button" class="btn btn-danger btn-sm box_item_remove">REM</button>
                                                </div>
                                            </div>
                                        </div>`)
        })
        $(document).on('click', '.box_item_remove', function () {
            $(this).parent().parent().parent().remove();
        })
    })
</script>
@endsection

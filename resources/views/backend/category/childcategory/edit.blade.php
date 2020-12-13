@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('childcategory.index') }}">
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
        <form action="{{route('childcategory.update', $childcategory->id)}}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{ $childcategory->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="main_category_id">
                                    Main Category
                                </label>
                                <select name="main_category_id" class="form-control">
                                    @foreach($maincategory as $main)
                                        <option value="{{$main->id}}" {{ $main->id == $childcategory->main_category_id ? "selected" : '' }}>{{$main->mc_name}}</option>
                                    @endforeach
                                </select>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">
                                    Sub Category
                                </label>
                                <select name="sub_category_id" class="form-control">
                                    @foreach($subcategory as $sub)
                                        <option value="{{$sub->id}}" {{ $sub->id == $childcategory->sub_category_id ? "selected" : '' }}>{{$sub->sc_name}}</option>
                                    @endforeach
                                </select>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="cc_name">
                                    Name
                                </label>
                                <input class="form-control" id="cc_name" name="cc_name" type="text" value="{{$childcategory->cc_name}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="cc_description">
                                    Description
                                </label>
                                <input class="form-control" id="cc_description" name="cc_description" type="text" value="{{$childcategory->cc_description}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="cc_type">
                                    Type
                                </label>
                                <select name="cc_type" class="form-control">
                                    <option value="1" {{ $childcategory->sc_type == 1 ? "selected" : '' }}>Product</option>
                                    <option value="2" {{ $childcategory->sc_type == 2 ? "selected" : '' }}>Service</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ccoverimage">
                                    Cover Image
                                </label>
                                <input type="file" class="form-control" name="ccoverimage" value="{{$childcategory->ccoverimage}}">
                                <img src="{{asset('/uploads/category/' . $childcategory->ccoverimage)}}" class="img img-fluid img-thumbnail">
                            </div
                        </div>
                    </div>
                    <button class="btn btn-success" style="margin-top: 15px;" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
</script>
<script>
    $(document).ready(function() {
        $('select[name="main_category_id"]').on('change', function() {
            var mainCategoryId = $(this).val();
            if(mainCategoryId) {
                $.ajax({
                    url: '/getSubcategory/'+mainCategoryId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      
                        $('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sub_category_id"]').append('<option value="'+ key +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="sub_category_id"]').empty();
            }
        });
        
    });
</script>
@endsection

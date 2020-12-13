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
        <form action="{{ route('childcategory.store') }}" enctype="multipart/form-data" file="true" method="POST">
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
                                    <option value="">Select One</option>
                                    @foreach($maincategory as $main)
                                        <option value="{{$main->id}}">{{$main->mc_name}}</option>
                                    @endforeach
                                </select>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="sub_category_id">
                                    Sub Category
                                </label>
                                <select name="sub_category_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($subcategory as $sub)
                                        <option value="{{$sub->id}}">{{$sub->sc_name}}</option>
                                    @endforeach
                                </select>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="cc_name">
                                    Name
                                </label>
                                <input class="form-control" id="cc_name" name="cc_name" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="cc_description">
                                    Description
                                </label>
                                <input class="form-control" id="cc_description" name="cc_description" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="cc_type">
                                    Type
                                </label>
                                <select name="cc_type" class="form-control">
                                    <option value="1">Product</option>
                                    <option value="2">Service</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ccoverimage">
                                    Cover Image
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="ccoverimage">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        
        $("#ccoverimage").spartanMultiImagePicker({
            fieldName:        'ccoverimage',
            maxCount:         1,
            rowHeight:        '100px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
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
        
    });
</script>
@endsection

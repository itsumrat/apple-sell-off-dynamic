@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('subcategory.index') }}">
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
        <form action="{{route('subcategory.update', $subcategory->id)}}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{ $subcategory->id }}">
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
                                        <option value="{{$main->id}}" {{ $main->id == $subcategory->main_category_id ? "selected" : '' }}>{{$main->mc_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="sc_name">
                                    Name
                                </label>
                                <input class="form-control" id="sc_name" name="sc_name" type="text" value="{{$subcategory->sc_name}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="sc_description">
                                    Description
                                </label>
                                <input class="form-control" id="sc_description" name="sc_description" type="text" value="{{$subcategory->sc_description}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="sc_type">
                                    Type
                                </label>
                                <select name="sc_type" class="form-control">
                                    <option value="1" {{ $subcategory->sc_type == 1 ? "selected" : '' }}>Product</option>
                                    <option value="2" {{ $subcategory->sc_type == 2 ? "selected" : '' }}>Service</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="scoverimage">
                                    Cover Image
                                </label>
                                <input type="file" class="form-control" name="scoverimage" value="{{$subcategory->scoverimage}}">
                                <img src="{{asset('/uploads/category/' . $subcategory->scoverimage)}}" class="img img-fluid img-thumbnail">
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
        
    });
</script>
@endsection

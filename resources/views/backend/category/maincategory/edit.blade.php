@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('maincategory.index') }}">
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
        <form action="{{route('maincategory.update', $maincategory->id)}}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{ $maincategory->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="mc_name">
                                    Name
                                </label>
                                <input class="form-control" id="mc_name" name="mc_name" type="text" value="{{ $maincategory->mc_name }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="mc_description">
                                    Description
                                </label>
                                <input class="form-control" id="mc_description" name="mc_description" type="text" value="{{ $maincategory->mc_description }}">
                            </div>
                            <div class="form-group">
                                <label for="mc_type">
                                    Type
                                </label>
                                <select name="mc_type" class="form-control">
                                    <option value="1" {{ $maincategory->mc_type == 1 ? "selected" : '' }}>Product</option>
                                    <option value="2" {{ $maincategory->mc_type == 2 ? "selected" : '' }}>Service</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mc_icon">
                                    Icon
                                </label>
                                <input type="file" class="form-control" name="mc_icon" value="{{$maincategory->mc_icon}}">
                                <img src="{{asset('/uploads/category/' . $maincategory->mc_icon)}}" class="img img-fluid img-thumbnail">
                            </div>
                            <div class="form-group">
                                <label for="mcoverimage">
                                    Cover Image
                                </label>
                                <input type="file" class="form-control" name="mcoverimage" value="{{$maincategory->mcoverimage}}">
                                <img src="{{asset('/uploads/category/' . $maincategory->mcoverimage)}}" class="img img-fluid img-thumbnail">
                            </div> --}}
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
<script src="{{ asset('js/spartan-multi-image-picker-min.js') }}">
</script>
<script>
    $(document).ready(function() {
        $("#mc_icon").spartanMultiImagePicker({
            fieldName:        'mc_icon',
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

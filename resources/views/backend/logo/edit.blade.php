@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('logo.index') }}">
            <i aria-hidden="true" class="fas fa-sign-out-alt fa-sm fa-fw mr-2">
            </i>
            Back
            </a>
            logo
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
        <form action="{{ route('logo.update', $logo->id) }}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{$logo->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="logo_img">
                                Image
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="logo">
                                        </div>
                                        <img src="{{asset('/uploads/logo/' . $logo->logo)}}" class="img img-fluid img-thumbnail" height="90" width="100%">
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
<script src="{{ asset('js/spartan-multi-image-picker-min.js') }}">
</script>
<script>
    $(document).ready(function() {
        $("#logo").spartanMultiImagePicker({
            fieldName:        'logo',
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
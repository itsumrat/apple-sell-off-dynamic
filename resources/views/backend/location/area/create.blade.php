@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('area.index') }}">
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
        <!-- create area-->
        <form action="{{ route('area.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="region_id">
                                    Region
                                </label>
                                <select name="region_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($region as $reg)
                                        <option value="{{$reg->id}}">{{$reg->name}}</option>
                                    @endforeach
                                </select>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="city_id"> City Name</label>
                                <select name="city_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($city as $cities)
                                        <option value="{{$cities->id}}">{{$cities->name}}</option>
                                    @endforeach
                                </select>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="name">Area </label>
                                <input class="form-control" id="name" name="name" type="text"/>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" style="margin-top: 15px;" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <!-- create area-->
    </div>
</div>
@endsection
@section('script')
</script>
<script>
    $(document).ready(function() {
        $('select[name="region_id"]').on('change', function() {
            var regionId = $(this).val();
            if(regionId) {
                $.ajax({
                    url: '/getCity/'+regionId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="city_id"]').empty();
            }
        });

    });
</script>
@endsection

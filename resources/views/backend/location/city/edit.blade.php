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
        <form action="{{route('city.update', $city->id)}}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{ $city->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="region_id">
                                    Region Name
                                </label>
                                  <select name="region_id" class="form-control">
                                    @foreach($region as $reg)
                                        <option value="{{$reg->id}}" {{ $reg->id == $city->region_id ? "selected" : '' }}>{{$reg->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">
                                   City Name
                                </label>
                                <input class="form-control" id="name" name="name" type="text" value="{{$city->name}}"/>
                            </div>
                             <div class="form-group">
                                <label for="name">
                                   Shipping Rate
                                </label>
                                <input class="form-control" id="shipping_rate" name="shipping_rate" type="text" value="{{$city->shipping_rate}}"/>
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
        
    });
</script>
@endsection

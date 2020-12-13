@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('shipping.index') }}">
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
        <form action="{{ route('shipping.store') }}" enctype="multipart/form-data" file="true" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="shipping_type">
                                    Name
                                </label>
                                <input class="form-control" id="shipping_type" name="shipping_type" type="text" required="">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="shipping_description">
                                    Description
                                </label>
                                <input class="form-control" id="shipping_description" name="shipping_description" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="shipping_price">
                                    Shipping Rate
                                </label>
                                <input class="form-control" id="shipping_price" name="shipping_price" type="number" required="">
                                </input>
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
@endsection

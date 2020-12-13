@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('processors.index') }}">
            <i aria-hidden="true" class="fas fa-sign-out-alt fa-sm fa-fw mr-2">
            </i>
            Back
            </a>
           Processor
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
        <form action="{{ route('processors.update', $processor->id) }}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{$processor->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="processors_type">
                                Type
                                </label>
                                <input class="form-control" id="processors_type" name="processors_type" type="text" value="{{ $processor->processors_type }}" />
                            </div>
                            {{-- <div class="form-group">
                                <label for="processors_description">
                                Description
                                </label>
                                <textarea class="form-control"  id="processors_description" value="{{ $processor->processors_description }}" name="processors_description">{{ $processor->processors_description }}</textarea>
                            </div> --}}
                            <div class="form-group">
                                <label for="processors_sign">
                                Sign
                                </label>
                                <input type="text" class="form-control"  id="processors_sign" name="processors_sign" value="{{ $processor->processors_sign }}"/>
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
@endsection

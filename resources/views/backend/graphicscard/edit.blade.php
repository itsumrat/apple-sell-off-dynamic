@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('graphicscards.index') }}">
            <i aria-hidden="true" class="fas fa-sign-out-alt fa-sm fa-fw mr-2">
            </i>
            Back
            </a>
           Graphics card
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
        <form action="{{ route('graphicscards.update', $graphicscard->id) }}" enctype="multipart/form-data" file="true" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{$graphicscard->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="graphics_card_size">
                                Size
                                </label>
                                <input class="form-control" id="graphics_card_size" name="graphics_card_size" type="text" value="{{ $graphicscard->graphics_card_size }}" />
                            </div>
                            <div class="form-group">
                                <label for="graphics_card_sign">
                                Sign
                                </label>
                                <input type="text" class="form-control"  id="graphics_card_sign" name="graphics_card_sign" value="{{ $graphicscard->graphics_card_sign }}"/>
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

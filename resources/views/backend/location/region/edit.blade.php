@extends('backend.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('region.index') }}">
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
        <form action="{{route('region.update', $region->id)}}"  method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="id" value="{{ $region->id }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">
                                    Resgion Name
                                </label>
                                <input class="form-control" id="name" name="name" type="text" value="{{ $region->name }}"/>
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


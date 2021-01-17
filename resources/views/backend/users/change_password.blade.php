@extends('backend.layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i aria-hidden="true" class="fas fa-sign-out-alt fa-sm fa-fw mr-2">
                </i>
                Change Password
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
            {!! Form::open(array('url' => 'admin_change_password','method'=>'POST')) !!}
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="current_password"
                               autocomplete="current-password">
                        <span class="text-danger">{{ $errors->first('current_password') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password"
                               autocomplete="current-password">
                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control"
                               name="new_confirm_password" autocomplete="current-password">
                        <span class="text-danger">{{ $errors->first('new_confirm_password') }}</span>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary"> Update Password </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

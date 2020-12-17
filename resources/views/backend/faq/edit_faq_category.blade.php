@extends('backend.layouts.app')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit Faqs Category </h6>
        </div>

        <div class="card-body">

            {!! Form::open(['url' => "/faqs_category/$data->id",'method'=>'put']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('', 'Name :') !!}
                    {!! Form::text('name', $data->name ,$attributes=['class'=>'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('name')  }}</span>
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Status: ') !!}
                    {{ Form::select('status', [ 1 => 'Active', 0 => 'De-active'], $data->status, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Save</button>
                <a href="/faqs_category" class="btn btn-secondary btn-sm">Close</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@extends('backend.layouts.app')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit Faqs Category </h6>
        </div>

        <div class="card-body">

            {!! Form::open(['url' => "/faqs_setting/$data->id",'method'=>'put']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('', 'Faqs Category: ') !!}
                    {{ Form::select('faqs_category_id', $category_array , $data->faqs_category_id , ['class' => 'form-control']) }}
                    <span class="text-danger">{{ $errors->first('faqs_category_id')  }}</span>
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Title :') !!}
                    {!! Form::text('title', $data->title ,$attributes=['class'=>'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('title')  }}</span>
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Description :') !!}
                    {!! Form::textarea('description', $data->description ,$attributes=['class'=>'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('description')  }}</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Save</button>
                <a href="/faqs_setting" class="btn btn-secondary btn-sm">Close</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

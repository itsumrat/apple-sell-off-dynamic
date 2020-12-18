@extends('backend.layouts.app')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @can('category-create')
                    <a href="#" class="btn btn-primary text-right modal-btn btn-sm" role="button" aria-disabled="true"
                       data-toggle="modal" data-target="#exampleModal" > Add Faqs Category</a>
                @endcan
            </h6>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['url' => '/faqs_setting','method'=>'post']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('', 'Faqs Category: ') !!}
                            {{ Form::select('faqs_category_id', $category_array , 'null', ['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('faqs_category_id')  }}</span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('', 'Title :') !!}
                            {!! Form::text('title', '',$attributes=['class'=>'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('title')  }}</span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('', 'Description :') !!}
                            {!! Form::textarea('description', '',$attributes=['class'=>'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('description')  }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm">Save</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Faqs Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Faqs Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td> {{ $value->faqs_category->name }} </td>
                            <td> {{ $value->title }} </td>
                            <td> {{ $value->description }} </td>
                            <td class="action_btn">
                                {{ Form::open(['url' => "/faqs_setting/$value->id", 'method'=>'DELETE'])  }}
                                <button class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{ Form::close()  }}
                                {{ Form::open(['url' => "/faqs_setting/$value->id/edit", 'method'=>'GET'])  }}
                                <button class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                {{ Form::close()  }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

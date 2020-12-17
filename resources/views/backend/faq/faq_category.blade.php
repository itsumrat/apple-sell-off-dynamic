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
                    {!! Form::open(['url' => '/faqs_category','method'=>'post']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('', 'Name :') !!}
                            {!! Form::text('name', '',$attributes=['class'=>'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('name')  }}</span>
                        </div>
                        <div class="form-group">
                            {!! Form::label('', 'Status: ') !!}
                            {{ Form::select('status', [ 1 => 'Active', 0 => 'De-active'], 'null', ['class' => 'form-control']) }}
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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td> {{ $key+1 }} </td>
                        <td> {{ $value->name }} </td>
                        @if($value->status == 1)
                        <td class="text-success"> Active </td>
                        @else
                        <td class="text-danger"> De-active </td>
                        @endif
                        <td class="action_btn">
                            {{ Form::open(['url' => "/faqs_category/$value->id", 'method'=>'DELETE'])  }}
                            <button class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                            {{ Form::close()  }}
                            {{ Form::open(['url' => "/faqs_category/$value->id/edit", 'method'=>'GET'])  }}
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

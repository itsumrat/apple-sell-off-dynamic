@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            @if(sizeof($logos) < 1 )
            @can('category-create')
            <a href="{{ route('logo.create') }}">
            <i aria-hidden="true" class="fa fa-plus">
            </i>
            Add
            </a>
            @endcan
            @endif
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
        <div class="table-responsive">
            <table cellspacing="0" class="table table-bordered custom-btn" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>Image </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>Image </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($logos as $key => $logo)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            <img src="{{asset('/uploads/logo/' . $logo->logo)}}" class="img img-fluid img-thumbnail" height="40" width="100">
                        </td>
                        <td>
                            <form action="{{ route('updatelogoStatus') }}" method="POST">
                                @csrf
                                @if($logo->status == 1)

                                    <input type="hidden" name="status" value="{{ $logo->id }}">
                                    <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i>
                                    </button>

                                @else
                                    <input type="hidden" name="status" value="{{ $logo->id }}">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                        <td>
                            @can('category-edit')
                            <a class="admin-actionbtn" href="{{ route('logo.edit',$logo->id) }}">
                            <i class="far fa-edit">
                            </i>
                            </a>
                            @endcan
                            @can('category-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['logo.destroy', $logo->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                            <button class="admin-actionbtn delete-btn" type="submit">
                            <i class="fas fa-trash-alt">
                            </i>
                            </button>
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
  @section('script')
<script>
    $(document).ready(function() {
       $('#dataTable').DataTable( {
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });
    });
</script>
@endsection
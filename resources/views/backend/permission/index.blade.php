@extends('backend.layouts.app')
@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        @can('permission-create')
        <a href="{{ route('permissions.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Add</a></h6>
        @endcan
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered custom-btn" id="dataTablePermission" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Guard</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Guard</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            
            @foreach ($permissions as $key => $permission)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $permission->name }}</td>
              <td>{{ $permission->guard_name }}</td>
              <td>{{ date('d-M-Y', strtotime($permission->created_at)) }}</td>
              <td>
                @can('permission-edit')
                    <a class="admin-actionbtn" href="{{ route('permissions.edit',$permission->id) }}"><i class="far fa-edit"></i></a>
                @endcan
                {{-- @can('permission-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                      <button type="submit" class="admin-actionbtn delete-btn"><i class="fas fa-trash-alt"></i></button> 
                    {!! Form::close() !!}
                @endcan --}}
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
      $('#dataTablePermission').DataTable();
    });
  </script>
  @endsection
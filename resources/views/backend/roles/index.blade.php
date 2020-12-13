 @extends('backend.layouts.app')


@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        {{-- @can('role-create')
        <a href="{{ route('roles.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Add</a></h6>
        @endcan --}}
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered custom-btn" width="100%" cellspacing="0">
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
            @foreach ($roles as $key => $role)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $role->name }}</td>
              <td>{{ $role->guard_name }}</td>
              <td>{{ date('d-M-Y', strtotime($role->created_at)) }}</td>
              <td>
                <a class="admin-actionbtn" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                @can('role-edit')
                    <a class="admin-actionbtn" href="{{ route('roles.edit',$role->id) }}"><i class="far fa-edit"></i></a>
                @endcan
                {{-- @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
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
    });
  </script>
  @endsection
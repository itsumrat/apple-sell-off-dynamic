@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Vendor List
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
                        <th>
                            Name
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Staff
                        </th>
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
                        <th>
                            Name
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Staff
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>
                            {{ ++$i }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->username }}
                        </td>
                        <td>
                            {{ $user->phone }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <a href="{{ route('staff', $user->id) }}">
                                <label class="badge badge-success">Show</label>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('updateStatus') }}" method="POST">
                                @csrf
                                @if($user->user_status == 1)
                                
                                    <input type="hidden" name="user_status" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        Active
                                    </button>
                                @else
                                    <input type="hidden" name="user_status" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        Pending
                                    </button>
                                @endif
                            </form>
                        </td>
                        <td>
                            @can('user-edit')
                            <a class="admin-actionbtn" href="{{ route('users.edit',$user->id) }}">
                                <i class="far fa-edit">
                                </i>
                            </a>
                            @endcan
                            @if($user->user_type != 'Admin')
                            @can('user-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            <button class="admin-actionbtn" type="submit">
                                <i class="fas fa-trash-alt">
                                </i>
                            </button>
                            {!! Form::close() !!}
                            @endcan
                            @endif
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
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        });
       $('.updateStatus').on('click', function() {
           var id = $(this).attr('data-id');
           if(id) {
                $.ajax({
                    url: ('/updateStatus/' + id),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                    }
                });
            }
       })

    });
</script>
@endsection



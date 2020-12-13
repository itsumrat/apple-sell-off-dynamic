@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            @can('category-create')
            <a href="{{ route('area.create') }}">
                <i aria-hidden="true" class="fa fa-plus">
                </i>
                Add
            </a>
            @endcan
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
                        <th>Region </th>
                        <th>City Name</th>
                        <th>
                           Area Name
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
                        <th>Region </th>
                        <th>City Name</th>
                        <th>
                           Area Name
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($areies as $key => $area)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $area->regionForArea ? $area->regionForArea->name : 'No Entry' }}
                        </td>
                        <td>
                            {{ $area->cityForArea ? $area->cityForArea->name : 'No Entry' }}
                        </td>
                        <td>
                            {{ $area->name }}
                        </td>
                       
                        <td>
                            @can('category-edit')
                            <a class="admin-actionbtn" href="{{ route('area.edit',$area->id) }}">
                                <i class="far fa-edit">
                                </i>
                            </a>
                            @endcan
                            @can('category-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['area.destroy', $area->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
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

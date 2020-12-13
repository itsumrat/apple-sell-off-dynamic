@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            @can('brand-create')
            <a href="{{ route('shipping.create') }}">
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
                        <th>
                            Type
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Price
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
                            Type
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Price
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
                    @foreach ($shippings as $key => $shipping)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $shipping->shipping_type }}
                        </td>
                        <td>
                            {{ $shipping->shipping_description }}
                        </td>
                        <td>
                            {{ $shipping->shipping_price }}
                        </td>
                        <td>
                            @if($shipping->shipping_status == 1)
                                <label class="badge badge-success">
                                    Active
                                </label>
                            @else
                                <label class="badge badge-warning">
                                    Deactive
                                </label>
                            @endif
                        </td>
                        </td>
                        <td>
                            @can('brand-edit')
                            <a class="admin-actionbtn" href="{{ route('shipping.edit',$shipping->id) }}">
                                <i class="far fa-edit">
                                </i>
                            </a>
                            @endcan
                            @can('brand-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['shipping.destroy', $shipping->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
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

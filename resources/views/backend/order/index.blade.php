@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row d-flex">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Order List</h6>
        </div>
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
                            Customer
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Order No
                        </th>
                        <th>
                            Product Qtn
                        </th>
                        <th>
                            Total Amount
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
                            Customer
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Order No
                        </th>
                        <th>
                            Product Qtn
                        </th>
                        <th>
                            Total Amount
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
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $order->orderOwner ? $order->orderOwner->name : ''}}
                        </td>
                        <td>
                            {{ $order->orderOwner ? $order->orderOwner->phone : '' }}
                        </td>
                        <td>
                            {{ $order->order_no }}
                        </td>
                        <td>
                            {{ $order->total_count }}
                        </td>
                        <td>
                            {{ $order->total_price }}
                        </td>
                        <td>
                            @if($order->order_status == 1)
                            <span class="badge badge-primary badge-pill">Processing</span>
                            @elseif($order->order_status == 2)
                            <span class="badge badge-info badge-pill">Delivery</span>
                            @elseif($order->order_status == 3)
                            <span class="badge badge-success badge-pill">Complete</span>
                            @else
                            <span class="badge badge-warning badge-pill">Pending</span>
                            @endif
                        </td>
                        <td>
                            @can('order-list')
                            <a class="admin-actionbtn" href="{{ route('orders.show',$order->id) }}">
                                <i class="far fa-eye">
                                </i>
                            </a>
                            @endcan
                            @can('order-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
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

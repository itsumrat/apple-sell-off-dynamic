@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            @can('product-create')
            <a href="{{ route('products.create') }}">
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
                            Name
                        </th>
                        <th>
                            Main Category
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Image
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
                            Main Category
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->mainCategory ? $product->mainCategory->mc_name : 'No Data' }}
                        </td>
                        <td>
                            @if($product->product_type == 1)
                            Product
                            @else
                            Service
                            @endif
                        </td>
                        <td>
                            <img src="{{asset('/uploads/product/' . $product->feature_image)}}" class="img img-fluid img-thumbnail" height="40" width="35">
                        </td>
                        <td>
                            @can('product-edit')
                            <a class="admin-actionbtn" href="{{ route('products.edit',$product->id) }}">
                                <i class="far fa-edit">
                                </i>
                            </a>
                            @endcan
                            @can('product-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
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

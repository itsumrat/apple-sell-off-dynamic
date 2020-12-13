@extends('backend.layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            @can('category-create')
            <a href="{{ route('childcategory.create') }}">
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
                        <th>Main Category</th>
                        <th>Sub Category</th>
                        <th>
                            Name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Type
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
                        <th>Main Category</th>
                        <th>Sub Category</th>
                        <th>
                            Name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($childcategories as $key => $childcategory)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $childcategory->mainCategoryForChild ? $childcategory->mainCategoryForChild->mc_name : 'No Entry' }}
                        </td>
                        <td>
                            {{ $childcategory->subCategoryForChild ? $childcategory->subCategoryForChild->sc_name : 'No Entry' }}
                        </td>
                        <td>
                            {{ $childcategory->cc_name }}
                        </td>
                        <td>
                            {{ $childcategory->cc_description }}
                        </td>
                        <td>
                            @if($childcategory->cc_type == 1)
                            Product
                            @else
                            Service
                            @endif
                        </td>
                        <td>
                            @can('category-edit')
                            <a class="admin-actionbtn" href="{{ route('childcategory.edit',$childcategory->id) }}">
                                <i class="far fa-edit">
                                </i>
                            </a>
                            @endcan
                            @can('category-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['childcategory.destroy', $childcategory->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
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

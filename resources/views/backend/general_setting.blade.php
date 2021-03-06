@extends('backend.layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('logo.index') }}"> <i aria-hidden="true" class="fas fa-sign-out-alt fa-sm fa-fw mr-2"> </i> Back </a>
                logo
            </h6>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>   Whoops!  </strong> There were some problems with your input.
                    <br>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    <br>
                </div>
            @endif
            {!! Form::open(['url' => "general_setting/$data->id", 'method' => 'put', 'files' => true]) !!}
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('', 'Name:') !!}
                                        {!! Form::text('name', $data->name , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('', 'Email:') !!}
                                        {!! Form::text('email', $data->email , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('', 'Technical Support Email:') !!}
                                        {!! Form::text('tech_support_email', $data->tech_support_email , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('', 'Technical Support Phone:') !!}
                                        {!! Form::text('tech_support_phone', $data->tech_support_phone , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('', 'Customer Support Email:') !!}
                                        {!! Form::text('cus_support_email', $data->cus_support_email , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('', 'Customer Support Phone:') !!}
                                        {!! Form::text('cus_support_phone', $data->cus_support_phone , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Address:') !!}
                                        {!! Form::textarea('address', $data->address , $attributes = ['class'=>'form-control', 'rows' => 3]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Support Title:') !!}
                                        {!! Form::text('support_title', $data->support_title , $attributes = ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Support Description:') !!}
                                        {!! Form::textarea('support_description', $data->support_description , $attributes = ['class'=>'form-control', 'rows' => 3]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Privacy Policy:') !!}
                                        {!! Form::textarea('privacy_policy', $data->privacy_policy , $attributes = ['class'=>'form-control', 'id' => 'privacy_policy' , 'rows' => 5]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Acceptable Communication:') !!}
                                        {!! Form::textarea('acceptable_communication', $data->acceptable_communication , $attributes = ['class'=>'form-control', 'id' => 'acceptable_communication' , 'rows' => 5]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Acceptable Use:') !!}
                                        {!! Form::textarea('acceptable_use', $data->acceptable_use , $attributes = ['class'=>'form-control', 'id' => 'acceptable_use' , 'rows' => 5]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Cookie :') !!}
                                        {!! Form::textarea('cookie', $data->cookie , $attributes = ['class'=>'form-control', 'id' => 'cookie' , 'rows' => 5]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('', 'Warranty & Return :') !!}
                                        {!! Form::textarea('warranty_and_return', $data->warranty_and_return , $attributes = ['class'=>'form-control', 'id' => 'warranty_and_return' , 'rows' => 5]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" style="margin-top: 15px;" type="submit">
                        Submit
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script>
        tinymce.init({
            selector: 'textarea#acceptable_communication',
            height : '300px',
        });
        tinymce.init({
            selector: 'textarea#acceptable_use',
            height : '300px',
        });
        tinymce.init({
            selector: 'textarea#cookie',
            height : '300px',
        });
        tinymce.init({
            selector: 'textarea#warranty_and_return',
            height : '300px',
        });
        tinymce.init({
            selector: 'textarea#privacy_policy',
            height : '300px',
        });

        function previewImage(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#'+id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

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
            {!! Form::open(['url' => "home_page_setting/$data->id", 'method' => 'put', 'files' => true]) !!}
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>First Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 1:') !!}
                                            {!! Form::hidden('first_sec_image_1', $data->first_sec_image_1) !!}
                                            {!! Form::file('first_sec_image_1', $attributes = ['placeholder'=>'Logo','class'=>'form-control', 'onchange'=>'previewImage(this,"first_sec_image_1")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 2:') !!}
                                            {!! Form::hidden('first_sec_image_2', $data->first_sec_image_2) !!}
                                            {!! Form::file('first_sec_image_2', $attributes = ['placeholder'=>'Logo','class'=>'form-control', 'onchange'=>'previewImage(this,"first_sec_image_2")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 3:') !!}
                                            {!! Form::hidden('first_sec_image_3', $data->first_sec_image_3) !!}
                                            {!! Form::file('first_sec_image_3', $attributes = ['placeholder'=>'Logo','class'=>'form-control', 'onchange'=>'previewImage(this,"first_sec_image_3")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 4:') !!}
                                            {!! Form::hidden('first_sec_image_4', $data->first_sec_image_4) !!}
                                            {!! Form::file('first_sec_image_4', $attributes = ['placeholder'=>'Logo', 'class'=>'form-control', 'onchange'=>'previewImage(this,"first_sec_image_4")']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ asset($data->first_sec_image_1) }}" style="height: auto; width: 100%;" id="first_sec_image_1"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <img src="{{ asset($data->first_sec_image_2) }}" style="height: auto; width: 100%;" id="first_sec_image_2"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <img src="{{ asset($data->first_sec_image_3) }}" style="height: auto; width: 100%;" id="first_sec_image_3"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <img src="{{ asset($data->first_sec_image_4) }}" style="height: auto; width: 100%;" id="first_sec_image_4"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Header 1', null) }}
                                            {!! Form::text('first_sect_heading_1', $data->first_sect_heading_1 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Header 2', null) }}
                                            {!! Form::text('first_sect_heading_2', $data->first_sect_heading_2 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Header 3', null) }}
                                            {!! Form::text('first_sect_heading_3', $data->first_sect_heading_3 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Header 4', null) }}
                                            {!! Form::text('first_sect_heading_4', $data->first_sect_heading_4 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Title 1', null) }}
                                            {!! Form::text('first_sect_title_1', $data->first_sect_title_1 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Title 2', null) }}
                                            {!! Form::text('first_sect_title_2',$data->first_sect_title_2 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Title 3', null) }}
                                            {!! Form::text('first_sect_title_3', $data->first_sect_title_3 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {{ Form::label('Title 4', null) }}
                                            {!! Form::text('first_sect_title_4', $data->first_sect_title_4 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>Second Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            {!! Form::label('', 'Heading:') !!}
                                            {!! Form::text('third_sec_heading', $data->third_sec_heading , $attributes = ['placeholder'=>'Heading','class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Title:') !!}
                                            {!! Form::text('third_sec_title', $data->third_sec_title , $attributes = ['placeholder'=>'Title','class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Image:') !!}
                                            {!! Form::hidden('third_sec_image', $data->third_sec_image) !!}
                                            {!! Form::file('third_sec_image', $attributes = ['placeholder'=>'Image','class'=>'form-control', 'onchange'=>'previewImage(this,"third_sec_image")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image Preview:') !!}
                                            <img src="{{ asset($data->third_sec_image) }}" style="height: 170px; width: 100%;" id="third_sec_image"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>Third Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {{ Form::label('Main Heading', null) }}
                                            {!! Form::text('four_sec_main_heading', $data->four_sec_main_heading , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {{ Form::label('Main Title', null) }}
                                            {!! Form::text('four_sec_main_title', $data->four_sec_main_title , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 1:') !!}
                                            {!! Form::hidden('four_sec_image_1', $data->four_sec_image_1) !!}
                                            {!! Form::file('four_sec_image_1', $attributes = ['placeholder'=>'Logo','class'=>'form-control', 'onchange'=>'previewImage(this,"four_sec_image_1")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 2:') !!}
                                            {!! Form::hidden('four_sec_image_2', $data->four_sec_image_2) !!}
                                            {!! Form::file('four_sec_image_2', $attributes = ['placeholder'=>'Logo','class'=>'form-control', 'onchange'=>'previewImage(this,"four_sec_image_2")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image 3:') !!}
                                            {!! Form::hidden('four_sec_image_3', $data->four_sec_image_3) !!}
                                            {!! Form::file('four_sec_image_3', $attributes = ['placeholder'=>'Logo','class'=>'form-control', 'onchange'=>'previewImage(this,"four_sec_image_3")']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{ asset($data->four_sec_image_1) }}" style="height: auto; width: 100%;" id="four_sec_image_1"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="{{ asset($data->four_sec_image_2) }}" style="height: auto; width: 100%;" id="four_sec_image_2"/>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="{{ asset($data->four_sec_image_3) }}" style="height: auto; width: 100%;" id="four_sec_image_3"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {{ Form::label('Title 1', null) }}
                                            {!! Form::text('four_sect_title_1', $data->four_sect_title_1 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {{ Form::label('Title 2', null) }}
                                            {!! Form::text('four_sect_title_2', $data->four_sect_title_2 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {{ Form::label('Title 3', null) }}
                                            {!! Form::text('four_sect_title_3', $data->four_sect_title_3 , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>Fourth Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            {!! Form::label('', 'Heading:') !!}
                                            {!! Form::text('fifth_sec_heading', $data->fifth_sec_heading , $attributes = ['placeholder'=>'Heading','class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Title:') !!}
                                            {!! Form::text('fifth_sec_title', $data->fifth_sec_title , $attributes = ['placeholder'=>'Title','class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Image:') !!}
                                            {!! Form::hidden('fifth_sec_image', $data->fifth_sec_image) !!}
                                            {!! Form::file('fifth_sec_image', $attributes = ['placeholder'=>'Image','class'=>'form-control', 'onchange'=>'previewImage(this,"fifth_sec_image")']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('', 'Image Preview:') !!}
                                            <img src="{{ asset($data->fifth_sec_image) }}" style="height: 170px; width: 100%;" id="fifth_sec_image"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>Social Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Instagram Url:') !!}
                                            {!! Form::text('instagram_url', $data->instagram_url , $attributes = ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Facebook Url:') !!}
                                            {!! Form::text('facebook_url', $data->facebook_url , $attributes = ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Twitter Url:') !!}
                                            {!! Form::text('twitter_url', $data->twitter_url , $attributes = ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('', 'Pinterest Url:') !!}
                                            {!! Form::text('pinterest_url', $data->pinterest_url , $attributes = ['class'=>'form-control']) !!}
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

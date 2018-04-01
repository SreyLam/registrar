
@extends('backend.layouts.app')
@section('after-styles')

    <link rel="stylesheet" href="{{ asset('node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"/>

@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('ទម្រង់កែប្រែប្រជាជន') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12" style="margin:auto; background-color: #FFFFFF; width:100%">
                {{Form::open(['url'=>'admin/post_editcitizen/'.$citizen->id, 'method'=>'put' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}
                {{--{{Form::open(['url'=>'admin/add-citizen', 'method'=>'post' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    {{--Left Form--}}
                                    <div class="col-md-6">
                                        {{Form::hidden('id', @$citizen->id, ['class'=>'form-control'])}}
                                        {{Form::label('commune_id', 'លេខកូដឃុំ')}}
                                        <select name="commune_id" id="number" class="form-control">
                                            @foreach($communes as $commune)
                                                @if($commune->id == $citizen->commune_id)
                                                <option selected value="{{ $commune->id }}">{{ $commune->name }}</option>
                                                    @continue
                                                @endif
                                                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('number_list', 'លេខបញ្ជី')}}
                                        {{Form::text('number_list', $citizen->number_list, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខបញ្ជី !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('number_book', 'លេខសៀវភៅ')}}
                                        {{Form::text('number_book', $citizen->number_book, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខសៀវភៅ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('lettertype_id', 'លេខកូដសំបុត្រ')}}
                                        <select name="lettertype_id" id="number" class="form-control">
                                            @foreach($lettertypes as $lettertype)
                                                @if($lettertype->id == $citizen->lettertype_id)
                                                    <option selected value="{{ $lettertype->id }}">{{ $lettertype->name }}</option>
                                                    @continue
                                                @endif
                                                <option value="{{ $lettertype->id }}">{{ $lettertype->name }}</option>
                                            @endforeach
                                        </select>

                                        {{--{{Form::label('lettertype_id', 'លេខប្រភេទសំបុត្រ')}}--}}
                                        {{--{{Form::text('lettertype_id', $citizen->lettertype_id, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខឃុំ !', 'id'=>'inputTextBox'])}}--}}
                                        {{--<div class="clearfix">&nbsp;</div>--}}

                                        {{Form::label('name', 'ឈ្មេាះសាមីខ្លូន')}}
                                        {{Form::text('name', $citizen->name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះសាមីខ្លូន !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('father_name', 'ឈ្មេាះឪពុក')}}
                                        {{Form::text('father_name', $citizen->father_name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះឪពុក !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('mother_name', 'ឈ្មេាះម្ដាយ')}}
                                        {{Form::text('mother_name', $citizen->mother_name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលឈ្មេាះម្ដាយ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        <div class="row"  style="margin-inside: 0px;">
                                            <div class="row"  style="margin-left: 0px;">
                                                <div class="col-md-6">
                                                    {{Form::label('date_birth', 'ថ្ងៃខែឆ្នាំកំណើត')}}
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input class="form-control" name="date_birth" value="{{$citizen->date_birth}}"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                    {{--{{Form::text('date_birth', $citizen->date_birth, ['class'=>'form-control datetimepicker1', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-format'=>'YYYY-MM-DD',''])}}--}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{Form::label('child_order', 'កូនទី')}}
                                                    {{Form::text('child_order', $citizen->child_order, ['class'=>'form-control datetimepicker9', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy/mm/dd'])}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>
                                                <div class="row" style="margin-left: 0px; float: left">
                                                    <div class="col-md-6">
                                                        {{Form::label('gender', 'ភេទ')}}
                                                        <select name="gender" id="id" class="form-control">
                                                            @foreach($genders as $gender)
                                                                @if($gender->id == $citizen->id)
                                                                    <option selected value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                                                    @continue
                                                                @endif
                                                                <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        {{Form::label('year', 'ធ្នាំ')}}
                                                        <div class='input-group date' id='datetimepicker9'>
                                                            <input type='text' class="form-control" name="year" value="{{ $citizen->year }}"/>
                                                            <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                        </div>
{{--                                                        {{Form::text('year', $citizen->year, ['class'=>'form-control datetimepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-format'=>'YYYY'])}}--}}
                                                        <div class="clearfix">&nbsp;</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class=" col-md-6">
                                                            {{Form::label('image','រូបភាព')}}
                                                            <?php

                                                            if(count($citizen->images)>0){
                                                                $images = $citizen->images;
                                                            }
                                                            ?>
                                                            @if(isset($images) && count($images)>0)
                                                                @foreach($images as $image)
                                                                    <img src="{{ asset('img/backend/citizen/'.$image->image_src)}} " alt="image" width="120%" height="120%" />
                                                                    {{Form::hidden('imageHidden', $image->image, array('class'=>'form-control col-md-3'))}}
                                                                @endforeach
                                                            @endif
                                                            <div class="clearfix">&nbsp;</div>
                                                            <img src="{{URL::to('/')}}/img/" alt="បន្ថែមរូបភាព" class="img-thumbnail" width="120px" height="20px" />
                                                            {{Form::file('image', ['class'=>'hiddenItem', 'id'=>'filechoose', 'style'=>'display:none;','name' => 'citizen_image'])}}
                                                        </div>
                                                        <div class="clearfix">&nbsp;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">


                                        {{Form::label('place_birth', 'ទីកន្លែងកំនើត')}}
                                        {{Form::textarea('place_birth', $citizen->place_birth, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើត !', 'id'=>'inputTextArea'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('f_place_birth', 'ទីកន្លែងកំណើតឪពុក')}}
                                        {{Form::textarea('f_place_birth', $citizen->f_place_birth, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើតឲពុក !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('m_place_birth', 'ទីកន្លែងកំណើតម្ដាយ')}}
                                        {{Form::textarea('m_place_birth', $citizen->m_place_birth, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើតម្ដាយ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('other', 'ព័ត៍មានផ្សេង')}}
                                        {{Form::textarea('other', $citizen->other, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលពត័រមានផ្សេង !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>
                                    </div>

                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-12 text-right">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-save"></i> បញ្ជូន
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        {{--{{Form::submit('បញ្ជូន',['class'=>'btn btn-primary'])}}--}}
                    </div>
                </div>
                {{Form::close()}}
            </div>

        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection

@section('after-scripts')

    <script type="text/javascript" src="{{ asset('node_modules/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('node_modules/moment/locale/km.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                locale: 'km',
                format: 'YYYY-MM-DD'
            });

            $('#datetimepicker9').datetimepicker({
                viewMode: 'years',
                format: 'YYYY'
            });
        });

        /* click finde image*/

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-thumbnail').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#filechoose").change(function () {
            readURL(this);
        });

        $(function(){
            $(".img-thumbnail").click(function(){
                $("#filechoose").trigger('click');
            });
        });

    </script>
@endsection

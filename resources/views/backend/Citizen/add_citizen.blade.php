
@extends('backend.layouts.app')

@section('after-styles')

    <link rel="stylesheet" href="{{ asset('node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"/>

@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('ប្រជាជន') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12" style="margin:auto; background-color: #FFFFFF; width:100%">
                {{Form::open(['url'=>'admin/add-citizen', 'method'=>'post' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    {{--Left Form--}}
                                    <div class="col-md-6">
                                        {{Form::hidden('id', @$citizen->id, ['class'=>'form-control'])}}
                                        <label>លេខកូដឃុំ</label>
                                        <select name="commune_id" id="number" class="form-control">
                                        @foreach($communes as $commune)
                                        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                                        @endforeach
                                        </select>
                                        {{--{{Form::label('number', 'លេខឃុំ')}}--}}
                                        {{--{{Form::text('number', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខឃុំ !', 'id'=>'inputTextBox'])}}--}}
                                        {{--<div class="clearfix">&nbsp;</div>--}}

                                        {{Form::label('number_list', 'លេខបញ្ជី')}}
                                        {{Form::text('number_list', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខបញ្ជី !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('number_book', 'លេខសៀវភៅ')}}
                                        {{Form::text('number_book', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខសៀវភៅ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        <label>លេខកូដសំបុត្រ</label>
                                        <select name="lettertype_id" id="number" class="form-control">
                                            @foreach($letterypes as $letterype)
                                                <option value="{{ $letterype->id }}">{{ $letterype->name }}</option>
                                            @endforeach
                                        </select>

                                        {{--{{Form::label('number', 'លេខប្រភេទសំបុត្រ')}}--}}
                                        {{--{{Form::text('number', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខឃុំ !', 'id'=>'inputTextBox'])}}--}}
                                        {{--<div class="clearfix">&nbsp;</div>--}}

                                        {{Form::label('name', 'ឈ្មេាះសាមុីខ្លូន')}}
                                        {{Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('father_name', 'ឈ្មេាះឪពុក')}}
                                        {{Form::text('father_name', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះឲពុក !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('mother_name', 'ឈ្មេាះម្ដាយ')}}
                                        {{Form::text('mother_name', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលឈ្មេាះម្ដាយ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        <div class="row"  style="margin-inside: 0px;">
                                            <div class="row"  style="margin-left: 0px;">
                                                <div class="col-md-6">
                                                    {{Form::label('date_birth', 'ថ្ងៃខែឆ្នាំកំនើត')}}
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input class="form-control" name="date_birth" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                    {{--{{Form::text('date_birth', '', ['class'=>'form-control datepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy/mm/dd'])}}--}}
                                                    {{--<div class="clearfix">&nbsp;</div>--}}
                                                </div>

                                                <div class="col-md-6">
                                                    {{Form::label('child_order', 'កូនទី')}}
                                                    {{Form::text('child_order', '', ['class'=>'form-control datepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy/mm/dd'])}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>ភេទ</label>
                                                    <select name="gender" id="id" class="form-control">
                                                        @foreach($genders as $gender)
                                                            <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="col-md-6">
                                                    {{Form::label('years', 'ឆ្នាំ')}}

                                                        <div class='input-group date' id='datetimepicker9'>
                                                            <input type='text' class="form-control" name="year"/>
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                        </div>
                                                </div>

                                                <div class=" col-md-6">
                                                    {{Form::label('image','បញ្ជូលរូបភាព')}}

                                                    <img src="{{URL::to('/')}}/img/" alt="image" class="img-thumbnail" width="100%" height="100%" />

                                                    {{--<input type="file" class="form-control" id="filechoose" style="display:none" accept="image/*" name="citizen_image"/>--}}
                                                    {{Form::file('image', ['class'=>'hiddenItem', 'id'=>'filechoose', 'style'=>'display:none;', 'accept' => 'image/*', 'name' => 'citizen_image'])}}


                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6">


                                        {{Form::label('place_birth', 'ទីកន្លែងកំនើត')}}
                                        {{Form::textarea('place_birth', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើត !', 'id'=>'inputTextArea'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('f_place_birth', 'ទីកន្លែងកំនើតឪពុក')}}
                                        {{Form::textarea('f_place_birth', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើតឲពុក !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('m_place_birth', 'ទីកន្លែងកំនើតម្ដាយ')}}
                                        {{Form::textarea('m_place_birth', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើតម្ដាយ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('other', 'ព័ត៍រមានផ្សេង')}}
                                        {{Form::textarea('other', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលពត័រមានផ្សេង !', 'id'=>'inputTextBox'])}}
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

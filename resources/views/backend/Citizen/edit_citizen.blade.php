
@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend..title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('ប្រជាជន') }} {{ $logged_in_user->name }}!</h3>
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
                                        <label>លេខឃុំ</label>
                                        {{--<select name="commune_id" id="id" class="form-control">--}}
                                            {{--@foreach($communes as $commune)--}}
                                                {{--<option value="{{ $commune->id }}">{{ $commune->name }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                        {{Form::label('commune_id', 'លេខឃុំ')}}
                                        {{Form::text('commune_id', $citizen->commune_id, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខឃុំ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('number_list', 'លេខបញ្ជី')}}
                                        {{Form::text('number_list', $citizen->number_list, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខបញ្ជី !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('number_book', 'លេខសៀវភៅ')}}
                                        {{Form::text('number_book', $citizen->number_book, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខសៀវភៅ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        <label>លេខប្រភេទសំបុត្រ</label>
                                        {{--<select name="lettertype_id" id="id" class="form-control">--}}
                                            {{--@foreach($letterypes as $letterype)--}}
                                                {{--<option value="{{ $letterype->id }}">{{ $letterype->name }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}

                                        {{Form::label('lettertype_id', 'លេខប្រភេទសំបុត្រ')}}
                                        {{Form::text('lettertype_id', $citizen->lettertype_id, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខឃុំ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('name', 'ឈ្មេាះ')}}
                                        {{Form::text('name', $citizen->name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('father_name', 'ឈ្មេាះឲពុក')}}
                                        {{Form::text('father_name', $citizen->father_name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះឲពុក !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('mother_name', 'ឈ្មេាះម្ដាយ')}}
                                        {{Form::text('mother_name', $citizen->mother_name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលឈ្មេាះម្ដាយ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        <div class="row"  style="margin-inside: 0px;">
                                            <div class="row"  style="margin-left: 0px;">
                                                <div class="col-md-6">
                                                    {{Form::label('date_birth', 'ថ្ងៃខែឆ្នាំកំនើត')}}
                                                    {{--<div class='input-group date' id='datetimepicker1'>--}}
                                                    {{--<input type='text' class="form-control" />--}}
                                                    {{--<span class="input-group-addon">--}}
                                                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                    {{Form::text('date_birth', $citizen->date_birth, ['class'=>'form-control datepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy/mm/dd'])}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{Form::label('child_order', 'កូនទីប៉ុន្មាន')}}
                                                    {{Form::text('child_order', $citizen->child_order, ['class'=>'form-control datepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy/mm/dd'])}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>ភេទអ្វី</label>
                                                    {{--<select name="gender" id="id" class="form-control">--}}
                                                        {{--@foreach($genders as $gender)--}}
                                                            {{--<option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                    {{Form::label('gender', 'ភេទអ្វី')}}
                                                    {{Form::text('gender',$citizen->gender , ['class'=>'form-control datepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy/mm/dd'])}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>

                                                <div class="col-md-6">
                                                    {{Form::label('year', 'ធ្វើនៅឆ្នាំណា')}}
                                                    {{--<div class='input-group date' id='datetimepicker9'>--}}
                                                    {{--<input type='text' class="form-control" />--}}
                                                    {{--<span class="input-group-addon">--}}
                                                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                    {{Form::text('year', $citizen->year, ['class'=>'form-control datepicker', 'required', 'placeholder'=>'Pleas Enter your date_posted !','data-dateformat'=>'yy'])}}
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">


                                        {{Form::label('pleace_birth', 'ទីកន្លែងកំនើត')}}
                                        {{Form::textarea('pleace_birth', $citizen->pleace_birth, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើត !', 'id'=>'inputTextArea'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('father_birth', 'ទីកន្លែងកំនើតឲពុក')}}
                                        {{Form::textarea('father_birth', $citizen->father_birth, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើតឲពុក !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('mother_birth', 'ទីកន្លែងកំនើតម្ដាយ')}}
                                        {{Form::textarea('mother_birth', $citizen->mother_birth, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលទីកន្លែងកំនើតម្ដាយ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('other', 'ពត័រមានផ្សេង')}}
                                        {{Form::textarea('other', $citizen->other, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលពត័រមានផ្សេង !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        {{Form::submit('បញ្ជូន',['class'=>'btn btn-primary'])}}
                    </div>
                </div>
                {{Form::close()}}
            </div>

        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    <script type="text/javascript" src="{{ asset('node_modules/moment/locale/km.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                locale: 'km'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker9').datetimepicker({
                viewMode: 'years'
            });
        });
    </script>
@endsection

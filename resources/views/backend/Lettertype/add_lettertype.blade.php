
@extends('backend.layouts.app')


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('គ្រប់គ្រងប្រភេទសំបុត្រ') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12" style="margin:auto; background-color: #FFFFFF; width:100%">

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    {{--Left Form--}}
                                    <div class="col-md-6 col-md-offset-3 ">
                                        {{Form::open(['url'=>'admin/add-lettertype', 'method'=>'post' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}
                                        {{Form::hidden('id', @$lettertype->id, ['class'=>'form-control'])}}


                                        {{Form::label('number', 'លេខកូដសំបុត្រ')}}
                                        {{Form::text('number', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខសំបុត្រ', 'id'=>'inputTextBox'])}}

                                        {{Form::label('name', 'ឈ្មេាះសំបុត្រ')}}
                                        {{Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលឈ្មោះសំបុត្រ', 'id'=>'inputTextBox'])}}


                                    </div>
                                </div>


                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-12">
                                        <div class="pull-left">

                                            <a href="/admin/lettertype" class="btn btn-danger btn-sm">ថយក្រោយ</a>

                                        </div>

                                        <div class="pull-right">

                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-save"></i> បញ្ជូន
                                            </button>
                                        </div>

                                        {{--<div class="form-group">--}}
                                            {{--<button type="submit" class="btn btn-primary btn-sm">--}}
                                                {{--<i class="fa fa-save"></i> បញ្ជូន--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
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




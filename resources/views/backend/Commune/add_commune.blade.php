
@extends('backend.layouts.app')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('គ្រប់គ្រងឃុំសង្កាត់') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12" style="margin:auto; background-color: #FFFFFF; width:100%">
                {{Form::open(['url'=>'admin/add-commne', 'method'=>'post' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    {{--Left Form--}}
                                    <div class="col-md-6">
                                        {{Form::hidden('id_product', @$commune->id, ['class'=>'form-control'])}}

                                        {{Form::label('number', 'លេខកូដឃុំ')}}
                                        {{Form::text('number', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខឃុំ !', 'id'=>'inputTextBox'])}}
                                        <div class="clearfix">&nbsp;</div>

                                        {{Form::label('name', 'ឈ្មេាះឃុំ')}}
                                        {{Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះឃុំ !', 'id'=>'inputTextBox'])}}
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
@endsection




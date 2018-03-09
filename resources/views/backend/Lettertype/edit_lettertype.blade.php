@extends('backend.layouts.app')

@section('page-header')
    <h1>

        <marquee width = "100%"> សូមស្វាគមន៏ប្រព័ន្ធគ្រប់គ្រង់ស្តិតិអត្រានុកូលដ្ឋាន</marquee>

    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('ទម្រង់កែប្រែប្រភេទសំបុត្រ') }}!</h3>
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
                                    <div class="col-md-12" style="margin:auto; background-color: #FFFFFF; width:100%">
                                        {{Form::open(['url'=>'admin/post_editlettertype/'.$lettertypes->id, 'method'=>'put' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}
                                        {{--Left Form--}}
                                        <div class="col-md-6">
                                            {{Form::hidden('id', @$lettertypes->id, ['class'=>'form-control'])}}

                                            {{Form::label('number', 'លេខប្រភេទសំបុត្រ')}}
                                            {{Form::text('number', $lettertypes->number, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះសំបុត្រ !', 'id'=>'inputTextBox'])}}
                                            <div class="clearfix">&nbsp;</div>
                                            {{Form::label('name', 'សំបុត្រ')}}
                                            {{Form::text('name', $lettertypes->name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះសំបុត្រ !', 'id'=>'inputTextBox'])}}
                                            <div class="clearfix">&nbsp;</div>

                                        </div>
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




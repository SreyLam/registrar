
@extends('backend.layouts.app')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('ទម្រង់កែប្រែឃុំសង្កាត់') }}</h3>
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
                                    <div class="col-md-offset-3 col-md-6">
                                        {{Form::open(['url'=>'admin/post_editcomm/'.$commune->id, 'method'=>'put' , 'files'=>true, 'enctype'=>'multipart/form-data'])}}
                                        {{Form::hidden('id_product', @$commune->id, ['class'=>'form-control'])}}

                                        {{Form::label('number', 'លេខកូដឃុំ')}}
                                        {{Form::text('number',$commune->number, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូលលេខកូដឃុំ !', 'id'=>'inputTextBox'])}}


                                        {{Form::label('name', 'ឈ្មេាះឃុំ')}}
                                        {{Form::text('name', $commune->name, ['class'=>'form-control', 'required', 'placeholder'=>'សូមបញ្ជូឈ្មេាះឃុំ !', 'id'=>'inputTextBox'])}}

                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-12 col-md-offset-3">
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

                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection




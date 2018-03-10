
@extends('backend.layouts.app')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('បញ្ជូលទិន្ន័យ') }}</h3>
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
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif


                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif


                                        <h3>Import File Form:</h3>
                                        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('admin/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


                                            <input type="file" name="import_file" />
                                            {{ csrf_field() }}
                                            <br/>


                                            <button class="btn btn-success">Import CSV or Excel File</button>


                                        </form>
                                        <br/>
                                        {{--<h3>Export File From Database:</h3>--}}
                                        {{--<div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">--}}
                                            {{--<a href="{{ url('admin/downloadExcel/xls') }}"><button class="btn btn-success ">Download Excel xls</button></a>--}}
                                            {{--<a href="{{ url('admin/downloadExcel/xlsx') }}"><button class="btn btn-success ">Download Excel xlsx</button></a>--}}
                                            {{--<a href="{{ url('admin/downloadExcel/csv') }}"><button class="btn btn-success ">Download CSV</button></a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 text-right">--}}
                        {{--{{Form::submit('បញ្ជូន',['class'=>'btn btn-primary'])}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{Form::close()}}
            </div>

        </div><!-- /.box-body -->
    </div><!--box box-success-->


@endsection


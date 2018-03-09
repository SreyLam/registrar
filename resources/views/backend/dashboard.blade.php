@extends('backend.layouts.app')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            {{--<marquee width = "50%"> សូមស្វាគមន៏ប្រព័ន្ធគ្រប់គ្រង់ស្តិតិអត្រានុកូលដ្ខាន</marquee>--}}
            <h2 class="box-title"> សូមស្វាគមន៏ប្រព័ន្ធគ្រប់គ្រង់ស្តិតិអត្រានុកូលដ្ខាន</h2>

            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {{--{!! trans('strings.backend.welcome') !!}--}}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
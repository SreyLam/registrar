@extends('backend.layouts.app')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            {{--<marquee width = "50%"> សូមស្វាគមន៏ប្រព័ន្ធគ្រប់គ្រង់ស្តិតិអត្រានុកូលដ្ខាន</marquee>--}}
            <h1 class="box-title">

                ប្រព័ន្ធគ្រប់គ្រងស្ថិតិអត្រានុកូលដ្ខាននៅក្នុង ស្រុកមណ្ឌលសីមា ខេត្តកោះកុង

            </h1>

            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <h4>
               នៅក្នុង ស្រុកមណ្ឌលសីមា ខេត្តកោះកុង​​ មាន​ឃុំចំនួន ៣០ឃុំ

            </h4>
            <h4>
                មាន​ប្រភេទសំបុត្រចំនួន ៦
            </h4>

            {{--{!! trans('strings.backend.welcome') !!}--}}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
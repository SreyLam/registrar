@extends('backend.layouts.app')

@section('before-styles')
    {{ Html::style('node_modules/sweetalert2/dist/sweetalert2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('សំបុត្រ') }}​!</h3>
            <div class="box-tools pull-right">
                {{--<a href="{{ route('admin.dashboard') }}">--}}
                <a href="{{ url('admin/add_type') }}" class="btn btn-success " style="margin-left:20%"><i class="fa fa-plus"></i> បញ្ជូលសំបុត្រ</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                    <th>ឈ្មេាះសំបុត្រ</th>
                    <th>សកម្មភាព</th>
                    </thead>
                    <tbody>
                    @foreach($type as $t)
                        <tr>
                            <td>{{$t->name}}</td>

                            <td>
                                <a href=""><button type="button" class="btn btn-danger delete-type" aria-label="Left Align">
                                        <input type="hidden" class="type_id" value="{{$t->id}}">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="{{URL::to('/admin/edit_type/'.@$t->id)}}"><button type="button" class="btn btn-success" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
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
@section("before-scripts")
    <script src="{{ asset('/node_modules/sweetalert2/dist/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('/node_modules/sweetalert2/dist/sweetalert2.js') }}"></script>
    <script src="{{ asset('/node_modules/jquery/dist/jquery.js') }}"></script>
    <script>

        $(document).ready(function(){
            $( document ).on( "click", '.delete-type' , function(e) {
                e.preventDefault();
                var type_id = $(this).find('.type_id').val();
                var dom = $(this).parent().parent().parent();
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                },function(){
                    $.ajax({
                        type: 'get',
                        url: '/admin/delete_type',
                        data: {
                            'type_id': type_id
                        },
                        success: function(response){
                            if(response.status == true){
                                swal(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )

                                dom.remove();
                            }
                        }
                    })
                })
            });
        })

    </script>
@endsection

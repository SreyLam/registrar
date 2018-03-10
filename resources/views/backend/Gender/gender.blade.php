@extends('backend.layouts.app')

@section('before-styles')
    {{ Html::style('node_modules/sweetalert2/dist/sweetalert2.css') }}
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('គ្រប់គ្រងភេទ') }}​</h3>
            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    <a href="{{ url('admin/add_gender') }}"
                       class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> បញ្ជូលភេទ</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                    <th>ឈ្មេាះភេទ</th>
                    <th>សកម្មភាព</th>
                    </thead>
                    <tbody>
                    @foreach($gender as $g)
                        <tr>
                            <td>{{$g->gender_name}}</td>

                            <td>
                                <a href=""><button type="button" class="btn btn-xs btn-danger delete-gender" aria-label="Left Align">
                                        <input type="hidden" class="gender_id" value="{{$g->id}}">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="{{URL::to('/admin/edit_gender/'.@$g->id)}}"><button type="button" class="btn btn-xs btn-success" aria-label="Left Align">
                                        <span class="fa fa-pencil" aria-hidden="true"></span>
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
            $( document ).on( "click", '.delete-gender' , function(e) {
                e.preventDefault();
                var gender_id = $(this).find('.gender_id').val();
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
                        url: '/admin/delete_gender',
                        data: {
                            'gender_id': gender_id
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

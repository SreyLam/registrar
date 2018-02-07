@extends('backend.layouts.app')

@section('before-styles')
    {{ Html::style('node_modules/sweetalert2/dist/sweetalert2.css') }}
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
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
            <h3 class="box-title">{{ trans('ផ្ទុករូបភាព') }}​!</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('admin/add_image') }}" class="btn btn-success " style="margin-left:20%"><i class="fa fa-plus"></i> បញ្ជូលរូបភាព</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">

                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                    <th>លេខូបភាព</th>
                    <th>ប្រភេទរូបភាព</th>
                    <th>ប្រភពរូបភាព</th>
                    </thead>

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
@section("after-scripts")
    {{--{{ Html::script('/node_modules/sweetalert2/dist/sweetalert2.all.js') }}--}}
    {{--{{ Html::script('/node_modules/sweetalert2/dist/sweetalert2.js') }}--}}
    {{--{{ Html::script('/node_modules/jquery/dist/jquery.js') }}--}}

    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}
    <script>

        $(document).ready(function(){

            $('#dt_basic').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.image.datatable") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: '0', name: 'number'},
                    {data: '1', name: 'name', sortable: false},
                    {data: '2', name: 'actions', sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $( document ).on( "click", '.delete-image' , function(e) {
                e.preventDefault();
                var image_id = $(this).find('.image_id').val();
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
                        url: '/admin/delete_image',
                        data: {
                            'image_id': image_id
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
        });


    </script>
@endsection

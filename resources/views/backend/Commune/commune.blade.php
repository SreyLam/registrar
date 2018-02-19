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
            <h3 class="box-title">{{ trans('ឃុំសង្កាត់') }}​!</h3>
            <div class="box-tools pull-right">
                {{--<a href="{{ route('admin.dashboard') }}">--}}
                <a href="{{ url('admin/add_commune') }}" class="btn btn-success " style="margin-left:20%"><i class="fa fa-plus"></i> បញ្ជូលឃុំសង្កាត់</a>
                <button class="btn btn-box-tool" data-widget="collapse" style="margin-right:20%"><i class="fa fa-minus"></i></button>
                </br>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">

                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                    <th>លេខឃុំ</th>
                    <th>ឈ្មេាះឃុំ</th>
                    <th>សកម្មភាព</th>
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
                    url: '{{ route("admin.commune.datatable") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: 'number', name: 'number'},
                    {data: 'name', name: 'name', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $( document ).on( "click", '.delete-commune' , function(e) {
                e.preventDefault();
                console.log($(this).find('.commune_id'))
                var commune_id = $(this).find('.commune_id').val();
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
                            url: '/admin/delete_comm',
                            data: {
                                'commune_id': commune_id
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

//        var responsiveHelper_dt_basic = undefined;
//
//        var breakpointDefinition = {
//            tablet : 1024,
//            phone : 480
//        };
//
//        $('#dt_basic').dataTable({
//            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
//            "t"+
//            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
//            "autoWidth" : true,
//            "oLanguage": {
//                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
//            },
//            "preDrawCallback" : function() {
//                // Initialize the responsive datatables helper once.
//                if (!responsiveHelper_dt_basic) {
//                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
//                }
//            },
//            "rowCallback" : function(nRow) {
//                responsiveHelper_dt_basic.createExpandIcon(nRow);
//            },
//            "drawCallback" : function(oSettings) {
//                responsiveHelper_dt_basic.respond();
//            }
//        });
    </script>
@endsection

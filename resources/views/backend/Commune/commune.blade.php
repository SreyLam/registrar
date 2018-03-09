@extends('backend.layouts.app')

@section('before-styles')
    {{ Html::style('node_modules/sweetalert2/dist/sweetalert2.css') }}
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('គ្រប់គ្រងឃុំសង្កាត់') }}​</h3>
            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    <a href="{{ url('admin/add_commune') }}"
                       class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> បញ្ជូលឃុំសង្កាត់</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">

                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                    <th>លេខកូដឃុំ</th>
                    <th>ឈ្មេាះឃុំ</th>
                    <th>សកម្មភាព</th>
                    </thead>

                </table>
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section("after-scripts")

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
    </script>
@endsection

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
            <h3 class="box-title">{{ trans('ប្រជាជន') }}​!</h3>
            <div class="box-tools pull-right">
                {{--<a href="{{ route('admin.dashboard') }}">--}}
                <a href="{{ url('admin/add_citizen') }}" class="btn btn-success " style="margin-left:20%"><i class="fa fa-plus"></i> បញ្ជូលពត៍មានប្រជាជន</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive"></div></dr>

                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                        <th>លេខឃុំ</th>
                        <th>លេខបញ្ជី</th>
                        <th>លេខសៀវភៅ</th>
                        <th>លេខប្រភេទសំបុត្រ</th>
                        <th>ឈ្មេាះ</th>
                        <th>ឈ្មេាះឲពុក</th>
                        <th>ឈ្មេាះម្ដាយ</th>
                        <th>ថ្ងៃខែឆ្នាំកំនើត</th>
                        <th>កូនទីប៉ិន្មាន</th>
                        <th>ភេទ</th>
                        <th>ធ្វើនៅឆ្នាំណា</th>
                        <th>ទីកន្លែងកំនើត</th>
                        <th>ទីកន្លែងកំនើតឲពុក</th>
                        <th>ទីកន្លែងកំនើតម្ដាយ</th>
                        <th>ពត័រមានផ្សេង</th>
                        {{--<th>រូបភាព</th>--}}
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
                    url: '{{ route("admin.citizen.datatable") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: 'commune_id', name: 'commune_id'},
                    {data: 'number_list', name: 'number_list'},
                    {data: 'number_book', name: 'number_book'},
                    {data: 'lettertype_id', name: 'lettertype_id'},
                    {data: 'name', name: 'name', sortable: false},
                    {data: 'father_name', name: 'father_name', sortable: false},
                    {data: 'mother_name', name: 'mother_name', sortable: false},
                    {data: 'date_birth', name: 'date_birth', sortable: false},
                    {data: 'child_order', name: 'child_order'},
                    {data: 'gender_id', name: 'gender', sortable: false},
                    {data: 'year', name: 'year', sortable: false},
                    {data: 'place_birth', name: 'place_birth', sortable: false},
                    {data: 'f_place_birth', name: 'f_place_birth', sortable: false},
                    {data: 'm_place_birth', name: 'm_place_birth', sortable: false},
                    {data: 'other', name: 'other', sortable: false},
//                    {data: 'image', name: 'image', sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $( document ).on( "click", '.delete-citizen' , function(e) {
                e.preventDefault();
                var citizen_id = $(this).find('.citizen_id').val();
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
                        url: '/admin/delete_citizen',
                        data: {
                            'citizen_id': citizen_id
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

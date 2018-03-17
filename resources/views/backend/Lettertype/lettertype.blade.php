@extends('backend.layouts.app')

@section('before-styles')
    {{ Html::style('node_modules/sweetalert2/dist/sweetalert2.css') }}
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('គ្រប់គ្រងប្រភេទសំបុត្រ') }}​</h3>
            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    <a href="{{ url('admin/add_lettertype') }}"
                       class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> បញ្ជូលប្រភេទសំបុត្រ</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="">
                    <th>លេខកូដសំបុត្រ</th>
                    <th>ឈ្មេាះសំបុត្រ</th>
                    <th>សកម្មភាព</th>
                    </thead>
                    <tbody>
                    @foreach($lettertype as $l)
                        <tr>
                            <td>{{$l->number}}</td>
                            <td>{{$l->name}}</td>
                            {{--<td>{{$l->type->name}}</td>--}}

                            <td>
                                @foreach (auth()->user()->roles as $role)
                                    @if($role->id == 1)
                                        <button type="button" class="btn btn-xs btn-danger delete-lettertype" aria-label="Left Align">
                                            <input type="hidden" class="lettertype_id" value="{{$l->id}}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    @endif
                                @endforeach

                                <a href="{{URL::to('/admin/edit_lettertype/'.@$l->id)}}"><button type="button" class="btn btn-xs btn-success" aria-label="Left Align">
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

@endsection
@section("before-scripts")
    <script src="{{ asset('/node_modules/sweetalert2/dist/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('/node_modules/sweetalert2/dist/sweetalert2.js') }}"></script>
    <script src="{{ asset('/node_modules/jquery/dist/jquery.js') }}"></script>
    <script>

        $(document).ready(function(){
            $( document ).on( "click", '.delete-lettertype' , function(e) {
                e.preventDefault();
                var lettertype_id = $(this).find('.lettertype_id').val();
                var dom = $(this).parent().parent();
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
                        url: '/admin/delete_lettertype',
                        data: {
                            'lettertype_id': lettertype_id
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

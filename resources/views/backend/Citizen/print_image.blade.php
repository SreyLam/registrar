
@extends('backend.layouts.app')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('ទម្រង់កែប្រែឃុំសង្កាត់') }}</h3>
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
                                    <div class="col-md-offset-3 col-md-6">
                                            <?php
                                            //   $image = 'img/backend/citizen.jpg';

                                            if($citizen->images){
                                                $images = $citizen->images;
                                            }
                                            //  dd($images)
                                            ?>
                                            <div class=" col-md-6">
                                                {{Form::label('image','Input Image')}}
                                                @foreach($images as $image)
                                                    <img src="{{ asset('img/backend/citizen/'.$image->image_src)}} " alt="image" class="img-thumbnail" width="100%" height="100%" />
                                                @endforeach
                                                {{--<img src="{{URL::to('/')}}/img/" alt="image" class="img-thumbnail" width="100%" height="100%" />--}}
                                                {{Form::file('image', ['class'=>'hiddenItem', 'id'=>'filechoose', 'style'=>'display:none;','name' => 'citizen_image'])}}
                                                {{Form::hidden('imageHidden', $image->image, array('class'=>'form-control col-md-3'))}}

                                            </div>



                                        </div>


                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-12 col-md-offset-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-print"></i> print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">

                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection




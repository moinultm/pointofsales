@extends('layouts.app')

@section('title')
   News
@endsection

@section('content-title')
    @if($news->id)
        {{trans('core.editing')}}: {{$news->title}}
    @else
        {{trans('core.add_new_news')}}
    @endif
@endsection

@section('breadcrumb')
    News
@endsection

@section('content')



    <div class="row">
        {!! Form::model($news, ['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row ', 'id' => 'ism_form']) !!}

        <div class="col-md-9">

            <div class="box box-default">

                <div class="box-body" style="">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-8">
                                    <label class="control-label">{{ trans('core.title') }}<span class="required">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control form-control-user" placeholder="Title" name="title" value="{{$news->title}}" />
                                    </div>


                                    <label class="control-label">{{ trans('core.sub_title') }}<span class="required">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control form-control-user" placeholder="Subtitle" name="sub_title" value="{{$news->sub_title}}" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label">{{ trans('core.title_color') }}<span class="required">*</span></label>
                                    <div class="">
                                        <select name="title_color" class="form-control selectcolor" data-live-search="true">
                                            <option value="color:green" style="color:green;" @if($news->title_color) selected @endif>Green
                                            </option>
                                            <option value="color:red" style="color:red;" @if($news->title_color) selected @endif>RED
                                            </option>
                                        </select>
                                    </div>

                                    <label class="control-label">{{ trans('core.is_latest') }}<span class="required">*</span></label>
                                    <div class="">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                <label class="control-label">{{ trans('core.content') }}</label>
                                <textarea class="form-control tinymce" name="address">{{$news->content}}</textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <label class="control-label">{{ trans('core.image') }}</label>

                                    <input type="text" class="form-control form-control-user" placeholder="img_caption" name="img_caption" value="{{$news->img_caption}}" />



                                </div>
                                <label class="control-label">{{ trans('core.preview') }}</label>


                                <div class="col-md-6">

                                    @if($news->image)
                                        <img src="{!! asset('uploads/profiles/'.$news->image)!!}" class="img-responsive img-thumbnail" alt="User Image" height="200" width="200" />
                                    @else
                                        <img src="{{asset('img/source-404.jpg')}}" class="img-responsive img-thumbnail" alt="User Image" height="100" width="100" />
                                    @endif

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                           <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                             <i class="fa fa-picture-o"></i> Image
                                           </a>
                                         </span>
                                          <input id="thumbnail" class="form-control" type="text" name="img_url" value={{ $news->image }}>
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                     </div>

                                </div>







                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">{{ trans('video_caption') }}</label>
                                    <input type="text"class="form-control form-control-user" value="{{$news->video_caption}}"/>


                                </div>

                                <div class="col-md-6">

                                    <label class="control-label">{{ trans('core.video_url') }}</label>
                                    <input type="text" class="form-control form-control-user" value="{{$news->video_url}}"/>
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="text-align: right">
                </div>

            </div>
        </div>
        <!-- /.col 9 end -->
        <div class="col-md-3">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Publish</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <div class="row">
                        <div class="col-md-12">

                            <label class="control-label">{{ trans('core.reporter_name') }}<span class="required">*</span></label>
                            <div class="">
                                <input type="text" class="form-control form-control-user" placeholder="Subtitle" name="reporter_name" value="{{$news->reporter_name}}" />
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="text-align: right">

                    <input class="btn btn-sm btn-primary" type="submit" id="submitButton" value=" @if($news->id)  {{ trans('core.edit') }} @else {{ trans('core.save') }} @endif" onclick="submitted()">

                </div>
            </div>


            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Options</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <div class="row">
                        <div class="col-md-12">

                            <label class="control-label">{{ trans('categories') }}</label>
                            <div class="">
                                <select name="category" class="form-control" data-live-search="true">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->category) selected @endif>
                                            {{$category->category}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                            <label class="control-label">{{ trans('core.area') }}</label>
                            <div class="">
                                <select name="area" class="form-control" data-live-search="true">
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}" @if($area->warehouse_id) selected @endif>
                                            {{$area->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


            {!! Form::close() !!}



   <!-- User search modal -->
   <div class="modal fade" id="searchModal">
       <div class="modal-dialog">
           <div class="modal-content">
               {!! Form::open(['class' => 'form-horizontal']) !!}
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title"> {{ trans('core.search').' '.trans('core.customer') }}</h4>
               </div>

               <div class="modal-body">
                   <div class="form-group">
                       {!! Form::label('Name', trans('core.name'), ['class' => 'col-sm-3']) !!}
                       <div class="col-sm-9">
                           {!! Form::text('name', Request::get('name'), ['class' => 'form-control']) !!}
                       </div>
                   </div>

                   <div class="form-group">
                       {!! Form::label('Email', trans('core.email'), ['class' => 'col-sm-3']) !!}
                       <div class="col-sm-9">
                           {!! Form::text('email', Request::get('email'), ['class' => 'form-control']) !!}
                       </div>
                   </div>
               </div>

               <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('core.close')}}</button>
                   {!! Form::submit('Search', ['class' => 'btn btn-primary', 'data-disable-with' => trans('core.searching')]) !!}
               </div>
               {!! Form::close() !!}
           </div>
       </div>
   </div>
   <!-- search modal ends -->
@stop

@section('js')
    @parent




    <script>
        $('#area').change(function(e) {
            var area_id=e.target.value;
            $.get('/ajax-area/'+area_id,function(data){
                $.each(data,function(index,subcatObj){
                    $('#sub_area').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
                });
            });
        });
    </script>




    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/filemanager.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>

        function myFunction() {
            document.getElementById("myLocalDate").value = "2014-01-02T11:42:13.510";
        }


        $('#lfm').filemanager('image');

        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>

@stop

<!--
 composer require unisharp/laravel-filemanager
 php artisan vendor:publish --tag=lfm_config
 php artisan vendor:publish --tag=lfm_public
 php artisan storage:link
-->
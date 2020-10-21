@extends('layouts.app')

@section('title')
   News
@endsection

@section('content-title')
    News
@endsection

@section('content')

   <div class="row">
       <div class="col-xl-12 col-lg-12">

    <div class="card shadow mb-4">

        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">

            </h6>
        </div>

        <div class="card-body col-xl-8 col-lg-7">
        {!! Form::model($news, ['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row ', 'id' => 'ism_form']) !!}

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        {!! Form::label('SubTitle',"Sub Title:") !!}
                        {!! Form::text('sub_title',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Title',"Title:") !!}
                        {!! Form::text('title',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ReporterName',"Reporter Name:") !!}
                        {!! Form::text('reporter_name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Content',"Content:") !!}
                        {!! Form::textarea('content',null,['class'=>'form-control tinymce']) !!}
                    </div>

                    {{--  <div class="form-group">
                             {!! Form::label('Image') !!}
                             {!! Form::file('img_url', null) !!}
                      </div>--}}

                    <div class="input-group">
                     <span class="input-group-btn">
                       <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                         <i class="fa fa-picture-o"></i> Choose
                       </a>
                     </span>
                        <input id="thumbnail" class="form-control" type="text" name="img_url" value={{ $img_url }}>
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">


                    <div class="form-group">
                        {!! Form::label('ImageCaption',"Image Caption:") !!}
                        {!! Form::text('img_caption',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Video',"Video:") !!}
                        {!! Form::text('video_url',null,['class'=>'form-control']) !!}
                    </div>


                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('published_at',"Publish Date:") !!}
                        {!! Form::input('datetime-local','published_at' ,$timeToday,['class'=>'form-control date-picker']) !!}
                    </div>

                    <div class="form-group tm-admin-Category">
                        <h3>Categories </h3>

                        @foreach($allSubCategories as $subCate)
                            {{--Parent Category<br>--}}
                            {{ Form::radio('category_check[]', $subCate->id,$subCate->id == $selectedParents ? 1:0  ) }}
                            {{ Form::label('category_name', $subCate->name) }}
                            <br>
                            @foreach($subCate->subCategory as $firstNestedSub)
                                {{--First Nested<br>--}}
                                <div  style="margin-left: 20px;">
                                    {{ Form::radio('category_check[]', $firstNestedSub->id, $firstNestedSub->id  ==  $selectedParents ? 1:0   ) }}
                                    {{ Form::label('category_name', $firstNestedSub->name) }}
                                </div>

                                @foreach($firstNestedSub->subCategory as $secondNestedSub)
                                    {{--Second Nested<br>--}}
                                    <div  style="margin-left: 40px;">
                                        {{ Form::radio('category_check[]',$secondNestedSub->id , $secondNestedSub->id  ==  $selectedParents ? 1:0   ) }}
                                        {{ Form::label('category_name',$secondNestedSub->name) }}
                                    </div>
                                    @foreach($secondNestedSub->subCategory as $thirdNestedSub)
                                        {{-- $thirdNested: $thirdNestedSub->name --}}
                                        <div  style="margin-left: 60px;">
                                            {{ Form::radio('category_check[]',$thirdNestedSub->id, $thirdNestedSub->id  ==  $selectedParents ? 1:0  ) }}
                                            {{ Form::label('category_name',$thirdNestedSub->name) }}
                                        </div>

                                    @endforeach()
                                @endforeach()
                            @endforeach()
                        @endforeach()

                    </div>

                    <div class="form-group">
                        {!! Form::label('location',"Division:") !!}
                        {!! Form::select('main_area',$areas,$selectedMainArea,['class'=>'form-control','id'=>'area']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('subLocation',"District:") !!}
                        {!! Form::select('sub_area',$subsAreas,$selectedSubArea,['class'=>'form-control','id'=>'sub_area']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('section',"Section:") !!}
                        {!! Form::select('section_check',$sections,$selectedSection,['class'=>'form-control','id'=>'section']) !!}
                    </div>

                </div>


                <div class="form-group">
                    {!! Form::submit($SubmitButtonText,['class'=>'form-control btn btn-primary']) !!}
                </div>


            </div>


        {{ Form::close() }}
        </div>
    </div>

       </div><!--col-xl-8 col-lg-7-->
   </div><!--Row-->


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
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


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
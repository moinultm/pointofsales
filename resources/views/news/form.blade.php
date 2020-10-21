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

        <div class="form-group">
            <label class="control-label">{{ trans('core.first_name') }}<span class="required">*</span></label>
            <div class="">
                <input type="text" class="form-control form-control-user" placeholder="First name" name="first_name" value="{{$news->title}}" />
            </div>
        </div>





        <div class="bg-default content-box text-center pad20A mrg25T">
            <input class="btn btn-lg btn-primary" type="submit" id="submitButton" value="{{ trans('core.save') }}" onclick="submitted()">
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

    </script>

@stop
@extends('layouts.app')

@section('title')
   User
@endsection

@section('content-title')
    User
@endsection

@section('content')

   <div class="row">
       <div class="col-xl-12 col-lg-12">

    <div class="card shadow mb-4">

        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if($user->id)
                    {{trans('core.editing')}}: {{$user->name}}
                @else
                    {{trans('core.add_new_user')}}
                @endif
            </h6>
        </div>

        <div class="card-body col-xl-8 col-lg-7">
        {!! Form::model($user, ['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row user', 'id' => 'ism_form']) !!}

        <div class="form-group">
            <label class="control-label">{{ trans('core.first_name') }}<span class="required">*</span></label>
            <div class="">
                <input type="text" class="form-control form-control-user" placeholder="First name" name="first_name" value="{{$user->first_name}}" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.last_name') }}<span class="required">*</span></label>
            <div class="">
                <input type="text" class="form-control form-control-user" placeholder="Last name" name="last_name" value="{{$user->last_name}}" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.email') }}<span class="required">*</span></label>
            <div class="">
                <input type="email" class="form-control form-control-user" placeholder="Email" name="email" value="{{$user->email}}"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.password') }}<span class="required">*</span></label>
            <div class="">
                <input type="password" class="form-control form-control-user" placeholder="Password" name="password"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.confirm_password') }}<span class="required">*</span></label>
            <div class="">
                <input type="password" class="form-control form-control-user" placeholder="Retype password" name="password_confirmation"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.role') }}</label>
            <div class="">
                <select name="role" class="form-control selectpicker" data-live-search="true" title="Please select a role..." @if($user->hasRole("Super User")) disabled="true" @endif>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.warehouse') }}</label>
            <div class="">
                <select name="warehouse_id" class="form-control selectpicker" data-live-search="true">
                    @foreach($warehouses as $warehouse)
                        <option value="{{$warehouse->id}}" @if($user->warehouse_id) selected @endif>
                            {{$warehouse->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.phone') }}</label>
            <div class="">
                <input type="text" class="form-control form-control-user" placeholder="Phone" name="phone" value="{{$user->phone}}"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('core.address') }}</label>
            <div class="">
                <textarea class="form-control form-control-user" name="address" rows="1">{{$user->address}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-3">
                @if($user->image)
                    <img src="{!! asset('uploads/profiles/'.$user->image)!!}" class="img-responsive img-thumbnail" alt="User Image" height="100" width="100" />
                @else
                    <img src="{{asset('img/source-404.jpg')}}" class="img-responsive img-thumbnail" alt="User Image" height="100" width="100" />
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-6">
                {!! Form::file('image') !!}
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
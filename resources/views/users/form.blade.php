@extends('layouts.app')

@section('title')
   User
@endsection

@section('content-title')
    User Edit
@endsection

@section('content')

   <div class="row">
       <div class="offset-2 col-xl-8 col-lg-7">




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

        <div class="card-body">

        {!! Form::model($user, ['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row user', 'id' => 'ism_form']) !!}

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.first_name') }}<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" placeholder="First name" name="first_name" value="{{$user->first_name}}" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.last_name') }}<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" placeholder="Last name" name="last_name" value="{{$user->last_name}}" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.email') }}<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="email" class="form-control form-control-user" placeholder="Email" name="email" value="{{$user->email}}"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.password') }}<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" placeholder="Password" name="password"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.confirm_password') }}<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" placeholder="Retype password" name="password_confirmation"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.role') }}</label>
            <div class="col-sm-6">
                <select name="role" class="form-control form-control-user selectpicker" data-live-search="true" title="Please select a role..." @if($user->hasRole("Super User")) disabled="true" @endif>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.warehouse') }}</label>
            <div class="col-sm-6">
                <select name="warehouse_id" class="form-control form-control-user selectpicker" data-live-search="true">
                    @foreach($warehouses as $warehouse)
                        <option value="{{$warehouse->id}}" @if($user->warehouse_id) selected @endif>
                            {{$warehouse->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.phone') }}</label>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" placeholder="Phone" name="phone" value="{{$user->phone}}"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">{{ trans('core.address') }}</label>
            <div class="col-sm-6">
                <textarea class="form-control form-control-user" name="address" rows="1">{{$user->address}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-3" >
                @if($user->image)
                    <img src="{!! asset('uploads/profiles/'.$user->image)!!}" class="img-responsive img-thumbnail" alt="User Image" height="45" width="45" />
                @else
                    <img src="{{asset('img/source-404.jpg')}}" class="img-responsive img-thumbnail" alt="User Image" height="45" width="45" />
                @endif
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 control-label"></label>
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

@stop
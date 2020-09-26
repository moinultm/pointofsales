@extends('layouts.app')
@section('title')
  {{trans('core.set_permission')}} {{trans('core.for')}}  {{$role->name}}
@stop
@section('content-title')
  {{trans('core.set_permission')}}
@stop
@section('content')


    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{trans('core.for')}}  {{$role->name}} </h6>
                </div>

                <div class="card-body">


  <form  method="post" class="form-horizontal bordered-row">
    {{ csrf_field() }}


    <div class="form-group">
      <input type="hidden" value="{{$role->id}}" name="role_id">

        <label class="control-label">
          <span >Select All</span>
        </label>
          <input type="checkbox"  name="all_permission" id="all-access" class="all-access" >
         </div>


      <div class="row">
        @foreach($permissions as $permission)
        <div class="col-md-4">


            <div class="form-group">
               <div class="row">
                   <div class="col-md-4"><input
                               type="checkbox"
                               class="input-group custom-control custom-checkbox"
                               data-toggle="switch"
                               name="permissions{{$permission->id}}"
                               value="{{$permission->id}}"
                               @if(in_array(ucwords($permission->type).' '.ucwords($permission->name), $rolePermissionNameLists) == true)
                               checked
                               @endif
                       ></div>
                   <div class="col-md-8"> <label class="control-label">  {{ ucwords($permission->type).' '.ucwords($permission->name) }} </label></div>
               </div>
            </div>

        </div>
        @endforeach
      </div>
      

      <div class="box-footer text-center">
        <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 10px;">{{trans('core.submit')}} </button>
      </div>

  </form>
                </div>
</div>

        </div>
    </div>
                
@stop


@section('js')
  @parent
  <script type="text/javascript">
    $(document).ready(function () {
    $(".all-access").click(function () {
        $(".input-group").prop('checked', $(this).prop('checked'));
        });
    });
  </script>

@stop


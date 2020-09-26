@extends('layouts.app')
@section('title')
	{{trans('core.role_index')}}
@stop
@section('content-title')
	{{trans('core.role_index')}}
@stop
@section('content')



	<div class="row">
		<div class="col-xl-12 col-lg-12">

			<div class="card shadow mb-4">
				<div class="card-header py-3">
					@if(auth()->user()->can('acl.manage'))
						<a type="button" class="font-weight-bold text-primary" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i>
							{{trans('core.add_new_role')}}
						</a>
					@endif

				</div>

				<div class="card-body">

					<table class="table table-hover table-bordered" >
						<thead class="table-header-color">
						<td class="text-center">{{trans('core.role')}}</td>
						<td class="text-center">{{trans('core.actions')}}</td>
						</thead>

						<tbody>
						@foreach($roles as $role)
							<tr>
								<td class="text-center">{{$role->name}}</td>
								<td class="text-center">
								<!-- <a href="#" class="btn btn-primary btn-xs">
								<i class="fa fa-edit"></i>
								{{trans('core.edit')}}
										</a> -->

									<!-- Set permission for role -->
									@if(auth()->user()->can('acl.set'))
										<a href="{{route('role.permission', $role->id)}}" class="btn btn-info btn-xs">
											<i class="fa fa-user-secret"></i>
											{{trans('core.set_permission')}}
										</a>
								@endif
								<!-- ends -->

								</td>
							</tr>
							<!-- Modal for delete role-->
						@endforeach
						</tbody>
					</table>
					<!-- Table Ends -->


				</div>
			</div>
		</div>
	</div>


	<!-- Modal for create role-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	  <div class="modal-dialog modal-dialog-centered" role="document">
		  {!! Form::open(['method' => 'post', 'class' => 'form-horizontal']) !!}

	    <div class="modal-content">
	      <div class="modal-header">

			  <h5 class="modal-title">  {{trans('core.add_new_role')}}</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
			  </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
            	<div class="col-md-1">
                	<label>{{trans('core.role')}}</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="role_name" required>
                </div>
            </div>
	      </div>
	      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
            	{{trans('core.close')}}
            </button>
            {!! Form::submit('Save', ['class' => 'btn btn-primary', 'data-disable-with' => 'Saving']) !!}
          </div>
        {!! Form::close() !!}
	    </div>
	  </div>
	</div>
	<!--Modal Ends-->
@stop
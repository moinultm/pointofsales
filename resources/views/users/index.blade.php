@extends('layouts.app')

@section('title')
    {{trans('core.user')}}
@endsection

@section('content-title')
    {{trans('core.user_list')}}
@endsection

@section('content')

       <!-- Page Heading -->
    <p class="mb-4"> </p>

       <div class="row">
           <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>

                <div class="card-body">

                    <div class="panel-heading mb-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                @if(auth()->user()->can('user.create'))
                                    <a href="{{route('user.new')}}" class="btn btn-success">
                                        <i class='fa fa-plus'></i>
                                        {{ trans('core.add_new_user') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                @if(count(Request::input()))

	            <a class="btn btn-success btn-alt btn-xs" href="{{ action('UserController@getIndex') }}" >
	            	<i class="fa fa-eraser"></i>
                    {{ trans('core.clear') }}
	            </a>

	            <a class="btn btn-success btn-alt btn-xs" id="searchButton" style="color: #ffffff">
	            	<i class="fa fa-search"></i>
                    {{ trans('core.modify_search') }}
	            </a>
	           @else
                                    <a class="btn btn-success" id="searchButton" style="color: #ffffff">
                                        <i class="fa fa-search"></i>
                                        {{ trans('core.search') }}
                                    </a>
                                @endif
                            </div>

                        </div>




                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>Sl</th>
                                <th>{{trans('core.name')}}</th>
                                <th>{{trans('core.email')}}</th>
                                <th>{{trans('core.role')}}</th>
                                <th>{{trans('core.actions')}}</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                   <td class="text-center">{{$user->first_name}}</td>

                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">
                                        @foreach($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @if(auth()->user()->can('user.manage'))
                                            <a href="{{route('user.edit', $user)}}" class="btn btn-info btn-alt btn-xs">
                                                <i class="fa fa-edit"></i>
                                                {{trans('core.edit')}}
                                            </a>

                                            <a type="button" data-toggle="modal" data-target="#userAction{{$user->id}}">
                                                @if($user->inactive == 1)
                                                    <span class="btn btn-success btn-alt btn-xs">
											{{trans('core.activate')}}
										</span>
                                                @else
                                                    <span class="btn btn-danger btn-alt btn-xs">
											{{trans('core.deactivate')}}
										</span>
                                                @endif
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-border btn-alt border-blue btn-link font-blue btn-xs" disabled>
                                                <i class="fa fa-edit"></i>
                                                {{trans('core.edit')}}
                                            </a>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



           </div>
       </div>


       <!-- User search modal -->
       <div class="modal animated--fade-in" id="searchModal">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   {!! Form::open(['class' => 'form-horizontal user']) !!}
                   <div class="modal-header">
                       <h5 class="modal-title"> {{ trans('core.search').' '.trans('core.customer') }}</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>

                   <div class="modal-body">
                       <div class="form-group">
                           {!! Form::label('Name', trans('core.name'), ['class' => '']) !!}

                               {!! Form::text('name', Request::get('name'), ['class' => 'form-control form-control-user']) !!}

                       </div>

                       <div class="form-group">
                           {!! Form::label('Email', trans('core.email'), ['class' => '']) !!}
                           {!! Form::text('email', Request::get('email'), ['class' => 'form-control form-control-user']) !!}

                       </div>
                   </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('core.close')}}</button>
                       {!! Form::submit('Search', ['class' => 'btn btn-primary', 'data-disable-with' => trans('core.searching')]) !!}
                   </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
       <!-- search modal ends -->


       <!-- Activate / Deactivate User -->
       <div class="modal fade" id="userAction{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

               <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                       <form method="post" action="{{route('user.status')}}">
                           {{ csrf_field() }}
                           <input type="hidden" name="user_id" value="{{$user->id}}">
                       <div class="modal-header">
                           <h5 class="modal-title">  {{$user->first_name}} {{$user->last_name}} is currently @if($user->inactive == 1) Inactive @else Active @endif</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           Do you want to @if($user->inactive == 1) Activate  @else Deactivate @endif this user
                       </div>

                       <div class="modal-footer">
                           <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                           <button type="submit" class="btn btn-danger">Yes</button>
                       </div>
                       </form>
                   </div>
               </div>
       </div>


@stop


@section('js')
    @parent
    <script>
        $(function() {
            $('#searchButton').click(function(event) {
                event.preventDefault();
                $('#searchModal').modal('show')
            });
        })
    </script>

@stop
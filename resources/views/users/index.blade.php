@extends('layouts.app')

@section('title')
ACL
@endsection

@section('content-title')
 Users
@endsection

@section('content')

       <!-- Page Heading -->
             <p class="mb-4">  </p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>Sl</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$user->first_name}}</td>
                                    <td class="text-center">{{$user->last_name}}</td>
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

@endsection
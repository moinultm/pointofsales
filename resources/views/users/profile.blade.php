@extends('layouts.app')

@section('title')
   Profile
@endsection

@section('content-title')
    Profile Details
@endsection

@section('content')


                    <div class="row">

                        <div class="col-md-3">

                            <div class="card shadow mb-4">

                                <div class="card-body">

                                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                                    @if(empty($user->image))
                                        <img src="{{asset('img/source-404.jpg')}}" class="img-fluid img-responsive" alt="{{ $user->name }}" />
                                    @else
                                        <img src="{!! asset('uploads/profiles/'. $user->image)!!}" class=" img-thumbnail  img-responsive" alt="User Image"/>
                                    @endif
                                    </div>

                                      <div class="d-sm-flex align-items-center justify-content-between mb-2">
                                            <h1 class="h3 mb-0 text-gray-800">{{title_case($user->name)}}</h1>
                                        </div>

                                    <p>
                                        @foreach($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </p>


                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="text-xs font-weight-bold text-success text-uppercase mb-1"  data-toggle="pill" href="#editProfile" role="tab" aria-controls="v-pills-profile" aria-selected="true">  {{ trans('core.edit_profile') }} </a>
                                            <a class="text-xs font-weight-bold text-success text-uppercase mb-1" data-toggle="pill" href="#details" role="tab" aria-controls="v-pills-messages" aria-selected="false">{{ trans('core.details') }}</a>
                                            <a class="text-xs font-weight-bold text-success text-uppercase mb-1" data-toggle="pill" href="#change_password" role="tab" aria-controls="v-pills-settings" aria-selected="false">{{ trans('core.change_password') }}</a>
                                        </div>

                                </div>
                            </div>


                        </div> <!-- /.col -->

                        <div class="col-md-9">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('core.details') }}</h6>
                                </div>
                                <div class="card-body">


                                    <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                        <!-- Details tab starts -->
                                        <div class="active tab-pane" id="details" style="padding-bottom: 50px;">


                                            <form class="user">

                                                <div class="form-group">
                                                    <label>{{ trans('core.email') }}</label>
                                                    <input type="email" class="form-control form-control-user"    placeholder="{{$user->email}}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{ trans('core.phone') }}</label>
                                                    <input type="email" class="form-control form-control-user"    placeholder="{{$user->phone}}" disabled>
                                                </div>


                                                @if($user->phone)
                                                    <div class="form-group">
                                                        <label>{{ trans('core.phone') }}</label>
                                                        <input class="form-control form-control-user"  placeholder="{{$user->phone}}" disabled>
                                                    </div>
                                                @endif

                                                @if($user->address)
                                                    <div class="form-group">
                                                        <label>{{ trans('core.address') }}</label>
                                                        <input class="form-control form-control-user"  placeholder="{{$user->address}}" disabled>
                                                    </div>
                                                @endif
                                            </form>
                                        </div>
                                        <!-- /.Details tab ends -->

                                        <!-- Edit Profile tab starts -->
                                        <div class="tab-pane" id="editProfile">

                                            <p>{{ trans('core.edit_profile') }}</p>

                                            <form class="form-horizontal user" method="post" action="{{route('user.profile.post')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">First Name</label>
                                                        <input type="text" class="form-control form-control-user" id="inputName" value="{{$user->first_name}}" name="first_name" @if($user->hasRole('Super User')) disabled="true" title="You Can't Edit This Section" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                                                        <input type="text" class="form-control form-control-user" id="inputName" value="{{$user->last_name}}" name="last_name" @if($user->hasRole('Super User')) disabled="true" title="You Can't Edit This Section" @endif>
                                                    </div>

                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('core.email') }}</label>
                                                    <input type="email" class="form-control form-control-user" value="{{$user->email}}" name="email" @if($user->hasRole('Super User')) disabled="true" title="You Can't Edit This Section" @endif>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">{{ trans('core.phone') }}</label>
                                                        <input type="text" class="form-control form-control-user"  value="{{$user->phone}}" name="phone">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">{{ trans('core.address') }}</label>
                                                    <textarea class="form-control form-control-user" name="address">{{$user->address}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10 ">
                                                        <button type="submit" class="btn btn-info">
                                                            {{ trans('core.update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Edit Profile Ends -->

                                        <!-- Password Change Tab Starts -->
                                        <div class="tab-pane" id="change_password">
                                            <h4>{{ trans('core.change_password') }}</h4><hr/>
                                            <form class="form-horizontal" method="post" action="{{route('change.password')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">
                                                        {{ trans('core.old_password') }}
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input id="password" type="password" class="form-control" placeholder="Type your old password"  name="old_password">

                                                        <!-- Alert Message Shows on Password Match State -->
                                                        <p id="correct" style="color: green;">
                                                            <i class="fa fa-check"></i> Valid
                                                        </p>
                                                        <p id="incorrect" style="color: red;">
                                                            <i class="fa fa-times"></i> Oops! Old password does not match!
                                                        </p>
                                                        <!-- Ends -->

                                                    </div>
                                                </div>

                                                <div id="pasword_change_form">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">
                                                            {{ trans('core.new_password') }}
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input id="new_password" type="password" class="form-control" placeholder="Type Your New Password"  name="password" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">
                                                            {{ trans('core.re_type_password') }}
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input id="new_pass_conf" type="password" class="form-control" placeholder="Re Type Password"  name="confirm_password" required>
                                                            <p id="match" style="color: green;">
                                                                <i class="fa fa-check"></i> Password Match
                                                            </p>
                                                            <p id="mis_match" style="color: red;">
                                                                <i class="fa fa-times"></i> Your Passwords don't Match
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="submit">
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button id="submit" type="submit" class="btn btn-success" id="submit">
                                                                {{ trans('core.submit') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- Password Change Tab Ends -->

                                    </div> <!-- Tab-content ends-->
                                </div> <!-- Nav-tabs-custom -->
                                </div><!--card body end-->

                        </div><!--card end-->
                    </div> <!-- col-9 Ends-->

                    </div><!-- row ends -->

@endsection

@section('js')
    @parent
    <script src="/assets/axios.min.js"></script>
    <script>
        var current_password = "{{$user->password}}";
        $('#pasword_change_form').hide();
        $('#correct').hide();
        $('#match').hide();
        $('#incorrect').hide();
        $('#mis_match').hide();
        $('#submit').hide();
        var password;
        var new_password;
        var new_pass_conf;
        $(document).ready(function(){
            $('#password').on('change', function(){
                password = $(this).val();
                var route = {!! json_encode(route('user.old-password')) !!}
            axios.post(route, { password: password})
                    .then(function (response) {
                        $('#pasword_change_form').show();
                        $('#correct').show();
                        $('#incorrect').hide();
                    })
                    .catch(function (response) {
                        $('#correct').hide();
                        $('#incorrect').show();
                        $('#pasword_change_form').hide();
                    })
            });

            $('#new_password').keyup(function(){
                new_password = $(this).val();
            });

            $('#new_pass_conf').keyup(function(){
                new_pass_conf = $(this).val();
                if(new_pass_conf == new_password){
                    $('#match').show();
                    $('#mis_match').hide();
                    $('#submit').show();
                }else{
                    $('#mis_match').show();
                    $('#match').hide();
                    $('#submit').hide();
                }
            });

        });
    </script>
@stop
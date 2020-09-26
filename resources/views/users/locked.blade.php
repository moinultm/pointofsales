
<!DOCTYPE html>
<html>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/>
<!-- Custom fonts for this template-->
<link href="/sb-admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="/sb-admin2/css/sb-admin-2.css" rel="stylesheet">

<title>

</title>


<body class="bg-gradient-primary">
<!--App-->
<div id="app">



    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">

                                        <h4 class="meta-subheading font-size-13 font-gray">{{ settings('site_name') }}</h4>
                                    </div>

                                    <div class=" row text-center mb-4 ">
                                    <div class="col-md-6">
                                        @if(empty($user->image))
                                            <img src="{{asset('img/source-404.jpg')}}" class="img-responsive img-thumbnail img-profile" alt="User Image"/>
                                        @else
                                            <img src="{!! asset('uploads/profiles/'. $user->image)!!}" class="img-bordered border-gray radius-all-4 img-full" alt="User Image"/>
                                        @endif
                                    </div>

                                        <div class="col-md-6">
                                            <h1 class="h4 text-gray-900 mb-4">  {{ $user->name }}  , Locked </h1>
                                        </div>
                                   </div>

                                    <div class="divider"></div>
                                    {!! Form::open([ 'route' => 'unlock','method' => 'post', 'class' => 'user']) !!}
                                    <div class="form-group">

                                            <input type="hidden" name="email" value="{{ $user->email }}">
                                            <input type="password" placeholder="Password" class="form-control form-control-user" name="password">

                                    </div>

                                    <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Unlock') }}
                                        </button>
                                </div>




                                    {{ Form::close() }}
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



</div>
<!--End App  -->

@section('js')
    @include('partials.scripts')
@show
</body>

</html>
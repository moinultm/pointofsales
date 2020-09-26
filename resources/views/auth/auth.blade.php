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
      {{settings('site_name')}}
</title>


<body class="bg-gradient-primary">
<!--App-->
<div id="app">

    <div class="container">
        @yield('content')

    </div>



</div>
<!--End App  -->

@section('js')
    @include('partials.scripts')
@show
</body>

</html>
<!DOCTYPE html>
<html>

@include('partials.htmlheader')

<body class="hold-transition skin-blue sidebar-mini">

<!-- Page Wrapper -->
<div class="wrapper">
@include('partials.mainheader')
@include('partials.sidebar')
<!-- Content Wrapper -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @include('partials.contentheader')
            @include('partials.messages')
        </section>
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('partials.footer')
</div>
<!--End Page Wrapper -->

    @section('js')
        @include('partials.scripts')
    @show
    </body>

    </html>

<!DOCTYPE html>
<html>

@include('partials.htmlheader')

<body class="hold-transition skin-blue sidebar-mini">

<!-- Page Wrapper -->
<div id="wrapper">

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
        <section class="content container-fluid">


            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



</div>
<!--End Page Wrapper -->

@include('partials.footer')


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

    @section('js')
    @include('partials.scripts')

        <script>

        </script>
    @show
    </body>

    </html>

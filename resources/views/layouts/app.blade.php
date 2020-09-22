<!DOCTYPE html>
<html>

@include('partials.htmlheader')

<body id="page-top">

<!--App-->
<div id="app">
<!-- Page Wrapper -->
<div id="wrapper">
@include('partials.sidebar')
<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        @include('partials.mainheader')
        <!-- Begin Page Content -->
            <div class="container-fluid">
                @include('partials.contentheader')

                    @yield('content')

            </div>
            <!--  End of Page Content -->
        </div>
        <!-- End of Main Content -->
        @include('partials.footer')
    </div>
    <!--End Content Wrapper -->
</div>
<!--End Page Wrapper -->
</div>
<!--End App  -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

    @section('js')
    @include('partials.scripts')
    @show
    </body>

    </html>

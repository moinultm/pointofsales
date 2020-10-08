@extends('layouts.app')

@section('title')
    {{trans('core.settings')}}
@endsection

@section('content-title')
    {{trans('core.settings')}}
@endsection

@section('content')

    <!-- Page Heading -->
    <p class="mb-4"> </p>

    <div class="row">
        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
                </div>

                <div class="card-body">


                    <div class="active tab-pane animated fadeIn" id="editSettings" >
                        @include('settings.partials.edit-settings')
                    </div>

                    
                </div>
            </div>



        </div>
    </div>






@stop


@section('js')
    @parent
    <script>

    </script>

@stop
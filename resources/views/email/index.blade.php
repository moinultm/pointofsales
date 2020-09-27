@extends('layouts.app')

@section('title')
    {{trans('core.settings')}}
@endsection

@section('content-title')
    {{trans('core.mailsettings')}}
@endsection

@section('content')

    <!-- Page Heading -->
    <p class="mb-4"> </p>

    <div class="row">
        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Email Server update</h6>
                </div>

                <div class="card-body">



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
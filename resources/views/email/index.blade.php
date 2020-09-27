@extends('layouts.app')

@section('title')
    {{trans('core.settings')}}
@endsection

@section('content-title')
    {{trans('core.email')}}
@endsection

@section('content')

    <!-- Page Heading -->
    <p class="mb-4"> </p>

    <div class="row">
        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Email Server configuration</h6>
                </div>

                <div class="card-body">
                    {!! Form::model($setting, ['method' => 'post', 'files' => true],['class' => 'user']) !!}

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.driver')}}
                            </label>
                            {!! Form::text('driver', $setting->driver, ['class' => 'form-control  form-control-user','placeholder'=>'Mailer']) !!}
                            {{ $errors->has('driver') ? 'has-error' : ''}}
                         </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.host')}}
                            </label>
                            {!! Form::text('host', $setting->host, ['class' => 'form-control  form-control-user','placeholder'=>'Host']) !!}
                            {{ $errors->has('host') ? 'has-error' : ''}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.port')}}
                            </label>
                            {!! Form::text('port', $setting->port, ['class' => 'form-control  form-control-user','placeholder'=>'Port']) !!}
                            {{ $errors->has('port') ? 'has-error' : ''}}
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.from_name')}}
                            </label>
                            {!! Form::text('from_name', $setting->from_name, ['class' => 'form-control  form-control-user','placeholder'=>'Sender Name']) !!}
                            {{ $errors->has('from_name') ? 'has-error' : ''}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.from_address')}}
                            </label>
                            {!! Form::text('from_address', $setting->from_address, ['class' => 'form-control  form-control-user','placeholder'=>'from_address']) !!}
                            {{ $errors->has('from_address') ? 'has-error' : ''}}
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.from_name')}}
                            </label>
                            {!! Form::text('encryption', $setting->encryption, ['class' => 'form-control  form-control-user','placeholder'=>'Encryption']) !!}
                            {{ $errors->has('encryption') ? 'has-error' : ''}}
                        </div>
                    </div>
                    <div class="form-group row">


                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.username')}}
                            </label>
                            {!! Form::text('username', $setting->username, ['class' => 'form-control  form-control-user','placeholder'=>'username']) !!}
                            {{ $errors->has('username') ? 'has-error' : ''}}
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>
                                {{trans('core.password')}}
                            </label>
                            {!! Form::text('password', $setting->password, ['class' => 'form-control  form-control-user','placeholder'=>'password']) !!}
                            {{ $errors->has('password') ? 'has-error' : ''}}
                        </div>
                    </div>


                    @if(auth()->user()->can('settings.manage'))
                        <div class="bg-default content-box text-center">
                            <button class="btn btn-lg btn-primary" type="submit">
                                {{ trans('core.save') }}
                            </button>
                        </div>
                    @endif
                    {!! Form::close() !!}
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
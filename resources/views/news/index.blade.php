@extends('layouts.app')

@section('title')
    {{trans('core.news')}}
@endsection

@section('content-title')
    {{trans('core.news_list')}}
@endsection

@section('content')

    <!-- Page Heading -->
    <p class="mb-4"> </p>

    <div class="row">
        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">News List</h6>
                </div>

                <div class="card-body">

                    <div class="panel-heading mb-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                @if(auth()->user()->can('user.create'))
                                    <a href="{{route('news.new')}}" class="btn btn-success">
                                        <i class='fa fa-plus'></i>
                                        {{ trans('core.add_new_news') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">

                                @if(count(Request::input()))

                                    <a class="btn btn-success btn-alt btn-xs" href="{{ action('UserController@getIndex') }}" >
                                        <i class="fa fa-eraser"></i>
                                        {{ trans('core.clear') }}
                                    </a>

                                    <a class="btn btn-success btn-alt btn-xs" id="searchButton" style="color: #ffffff">
                                        <i class="fa fa-search"></i>
                                        {{ trans('core.modify_search') }}
                                    </a>
                                @else
                                    <a class="btn btn-success" id="searchButton" style="color: #ffffff">
                                        <i class="fa fa-search"></i>
                                        {{ trans('core.search') }}
                                    </a>
                                @endif
                            </div>

                        </div>


                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>Sl</th>
                                <th>{{trans('core.name')}}</th>
                                <th>{{trans('core.email')}}</th>
                                <th>{{trans('core.role')}}</th>
                                <th>{{trans('core.actions')}}</th>
                            </tr>
                            </thead>

                            <tbody>


                            </tbody>


                        </table>



                    </div>

                    <div class="row  mt-2">
                        <div class="col-sm-12 col-md-5">

                            Total Records:  {{$users->total()}}
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="float-right">  {{ $users->links() }}</div>


                        </div>
                    </div>

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
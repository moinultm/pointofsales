@extends('layouts.app')

@section('title')
    {{trans('core.user')}}
@endsection

@section('content-title')
    {{trans('core.user_list')}}
@endsection

@section('content')

    <!-- Page Heading -->
    <p class="mb-4"> </p>

    <div class="row">
        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                </div>

                <div class="card-body">

                    <div class="panel-heading mb-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                                @if(auth()->user()->can('category.create'))
                                    <a href="{{route('category.new')}}" class="btn btn-success btn-alt btn-xs">
                                        <i class='fa fa-plus'></i>
                                        {{trans('core.add_new_category')}}
                                    </a>
                                @endif

                                @if(count(Request::input()))
                                    <span class="pull-right">
            <a class="btn btn-alt btn-default font-black btn-xs" href="{{ action('CategoryController@getIndex') }}">
            	<i class="fa fa-eraser"></i>
                {{ trans('core.clear') }}
            </a>

            <a class="btn btn-primary btn-alt btn-xs" id="searchButton">
            	<i class="fa fa-search"></i>
                {{ trans('core.modify_search') }}
            </a>
        </span>
                                @else
                                    <a class="btn btn-primary btn-alt btn-xs pull-right" id="searchButton">
                                        <i class="fa fa-search"></i> {{ trans('core.search') }}
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


                    <div class="table-responsive" style="min-height: 300px;">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                            <thead class="{{settings('theme')}}">
                            <td class="text-center font-white">#</td>
                            <td class="text-center font-white">{{trans('core.name')}}</td>
                            <td class="text-center font-white">{{trans('core.subcategory')}}</td>
                            <td class="text-center font-white">{{trans('core.actions')}}</td>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">
                                        <ol>

                                        </ol>
                                    </td>
                                    <td class="text-center">
                                        @if(auth()->user()->can('category.manage'))
                                            <a href="{{route('category.edit',$category)}}" class="btn btn-info btn-alt btn-xs">
                                                <i class="fa fa-edit"></i>
                                                {{trans('core.edit')}}
                                            </a>
                                            <!-- Delete modal trigger -->
                                            <a type="button" class="btn btn-danger btn-alt btn-xs" data-toggle="modal" data-target="#deleteModal{{$category->id}}">
                                                <i class="fa fa-trash"></i>
                                                {{trans('core.delete')}}
                                            </a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    {!! Form::open(['route' => ['category.delete', $category], 'method' => 'delete' ]) !!}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    {{$category->category_name}}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>
                                                    {{trans('core.delete_alert')}} <b>{{$category->category_name}}</b> {{trans('core.category')}}?
                                                </h4>
                                                <br>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">
                                                    {{trans('core.delete')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--Pagination-->
                    <div class="pull-right">
                        {{ $categories->links() }}
                    </div>
                    <!--Ends-->

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
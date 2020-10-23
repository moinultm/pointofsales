@extends('layouts.app')

@section('title')
	{{trans('core.user')}}
@endsection

@section('content-title')

@endsection

@section('breadcrumb')
	<a href="{{route('category.index')}}">{{trans('core.category_index')}}</a>
	<li>
		@if($category->id)
			{{trans('core.editing')}} {{$category->category_name}}
		@else
			{{trans('core.add_new_category')}}
		@endif
	</li>
@stop

@section('content')


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Category List</h6>
		</div>

		<div class="card-body">
			<div class="panel-body">
				<h3 class="title-hero">
					@if($category->id)
						{{trans('core.editing')}}
						{{$category->category_name}}
					@else
						{{trans('core.add_new_category')}}
					@endif
				</h3>
				<div class="example-box-wrapper">
					{!! Form::model($category,['method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row', 'id' => 'ism_form']) !!}

					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('core.category_name') }}</label>
						<span class="required">*</span>
						<div class="col-sm-6">
							{!! Form::text('name', $category->category_name, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" title="{{trans('core.category_info')}}">
							{{trans('core.category_name')}}
							<span class="required">*</span>
						</label>

						<div class="col-sm-6">
							{!! Form::select('parent_id', $subcategory, null, ['class' => 'form-control ', 'title' => 'Please select a category','placeholder' => 'Primary Select', 'data-live-search' => 'true']) !!}
						</div>
					</div>

					<div class="bg-default content-box text-center pad20A mrg25T">
						<input class="btn btn-lg btn-primary" type="submit" id="submitButton" value="{{ trans('core.save') }}" onclick="submitted()">
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>

	</div>



@stop

@section('js')
	@parent
	
@stop
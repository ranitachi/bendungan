@extends('backpack::layouts.master')

@section('title')
	<title>{{ $crud->entity_name_plural }} - Bendungan Hebat</title>
	<style>
		td {
			font-size: 11px !important;
		}

		td > a {
			color: #237ba1;
		}
	</style>
@endsection

@section('content')
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
			<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<div class="d-flex align-items-center flex-wrap mr-1">
					<div class="d-flex align-items-baseline mr-5">
						<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">{{ $crud->entity_name_plural }}</h2>
					</div>
				</div>
				<div class="d-flex align-items-center">
					@include('includes.top')
				</div>
			</div>
		</div>
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<div class="card card-custom gutter-b">
					<div class="card-header flex-wrap py-3">
						<div class="card-title">
							<h3 class="card-label">{{ trans('backpack::crud.edit') }} {{ $crud->entity_name }}</h3>
						</div>
						<div class="card-toolbar">
							@if ($crud->hasAccess('list'))
								<a href="{{ url($crud->route) }}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back To {{ ucwords($crud->entity_name_plural) }}</span></a><br><br>
								{{-- <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back To {{ ucwords($crud->entity_name_plural) }}</span></a><br><br> --}}
							@endif
						</div>
					</div>
							<!-- Default box -->

					@include('includes.alert')

					<form method="post"
							action="{{ url($crud->route.'/'.$entry->getKey()) }}"
							@if ($crud->hasUploadFields('update', $entry->getKey()))
							enctype="multipart/form-data"
							@endif
							>
					{!! csrf_field() !!}
					{!! method_field('PUT') !!}

						@if ($crud->model->translationEnabled())
						<div class="mb-2 text-right">
							<!-- Single button -->
							<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{trans('backpack::crud.language')}}: {{ $crud->model->getAvailableLocales()[request()->input('locale')?request()->input('locale'):App::getLocale()] }} &nbsp; <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								@foreach ($crud->model->getAvailableLocales() as $key => $locale)
									<a class="dropdown-item" href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a>
								@endforeach
							</ul>
							</div>
						</div>
						@endif
						<!-- load the view from the application if it exists, otherwise load the one in the package -->
						@if(view()->exists('vendor.backpack.crud.form_content'))
							@include('vendor.backpack.crud.form_content', ['fields' => $crud->fields(), 'action' => 'edit'])
						@else
							@include('crud::form_content', ['fields' => $crud->fields(), 'action' => 'edit'])
						@endif

						<div class="card-footer">
							@include('crud::inc.form_save_buttons')
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


@endsection


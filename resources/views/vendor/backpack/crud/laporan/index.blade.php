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
                            <h3 style="width:100%;float:left">LAPORAN PENDATAAN</h3> 
						</div>
						<div class="card-toolbar">
							@if ( $crud->buttons()->where('stack', 'top')->count() ||  $crud->exportButtons())
									<div class="d-print-none {{ $crud->hasAccess('create')?'with-border':'' }}">
	
										@include('crud::inc.button_stack', ['stack' => 'top'])
	
									</div>
							@endif
						</div>
					</div>
					<div class="card-body">
						<div class="row mb-8">
							<div class="{{ $crud->getListContentClass() }}">
	
								<div class="row mb-0">
									<div class="col-sm-6">
										
									</div>
									<div class="col-sm-6">
										<div id="datatable_search_stack" class="mt-sm-0 mt-2 d-print-none"></div>
									</div>
								</div>
	
								{{-- Backpack List Filters --}}
								@if ($crud->filtersEnabled())
									@include('crud::inc.filters_navbar')
								@endif

								@include('includes.alert')
								<form action="{{ url('export-laporan') }}" method="POST">
									@csrf
										<div class="row">
											<div class="col-md-6">
												@include('crud::form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ])
											</div>
										</div>
										<div class="row">
												<div class="col-md-6 text-right">
													<button type="submit" class="btn btn-xs btn-primary pull-right">
														<i class="fa fa-save"></i> Show
													</button>
												</div>
										</div>
								</form>

								@if ( $crud->buttons()->where('stack', 'bottom')->count() )
								<div id="bottom_buttons" class="d-print-none text-center text-sm-left">
									@include('crud::inc.button_stack', ['stack' => 'bottom'])
	
									<div id="datatable_button_stack" class="float-right text-right hidden-xs"></div>
								</div>
								@endif
								
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div id="bottom_buttons" class="d-print-none text-center text-sm-left">
							
						</div>
					</div>
				</div>
			</div>
				
		</div>
	</div>
@endsection

@section('footscript')
	<link href="{{ asset('packages/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('packages/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{ asset('packages/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('packages/select2/dist/js/i18n/' . app()->getLocale() . '.js') }}"></script>
	<script>
		$('.select2').select2();
	</script>
	<style>
		.select2-container--default .select2-selection--single {
			height: 40px !important;
			line-height: 1.42857143 !important;
			padding: 0px 24px 6px 12px !important;
		}
		.select2-selection--single .select2-selection__arrow{
			height:38px !important;
		}
	</style>
@endsection

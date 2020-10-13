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
						<div class="row mb-4">
							<div class="col-sm-12">
								<div id="map" style="height:400px;width:100%"></div>
							</div>
						</div>
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

								<table id="crudTable" class="table table-striped table-bordered mt-2" cellspacing="0">
									<thead>
									<tr>
										{{-- Table columns --}}
										{{-- <th>No</th> --}}
										@if ($crud->index_column)
											<th data-orderable="false" style="width: 12px;">No</th>
										@endif
										@foreach ($crud->columns() as $column)
										<th
											data-orderable="{{ var_export($column['orderable'], true) }}"
											data-priority="{{ $column['priority'] }}"
											{{--
	
												data-visible-in-table => if developer forced field in table with 'visibleInTable => true'
												data-visible => regular visibility of the field
												data-can-be-visible-in-table => prevents the column to be loaded into the table (export-only)
												data-visible-in-modal => if column apears on responsive modal
												data-visible-in-export => if this field is exportable
												data-force-export => force export even if field are hidden
	
											--}}
	
											{{-- If it is an export field only, we are done. --}}
											@if(isset($column['exportOnlyField']) && $column['exportOnlyField'] === true)
											data-visible="false"
											data-visible-in-table="false"
											data-can-be-visible-in-table="false"
											data-visible-in-modal="false"
											data-visible-in-export="true"
											data-force-export="true"
											@else
											data-visible-in-table="{{var_export($column['visibleInTable'] ?? false)}}"
											data-visible="{{var_export($column['visibleInTable'] ?? true)}}"
											data-can-be-visible-in-table="true"
											data-visible-in-modal="{{var_export($column['visibleInModal'] ?? true)}}"
											@if(isset($column['visibleInExport']))                     
												@if($column['visibleInExport'] === false)
												data-visible-in-export="false"   
												data-force-export="false"    
												@else    
												data-visible-in-export="true"    
												data-force-export="true"   
												@endif   
											@else    
												data-visible-in-export="true"    
												data-force-export="false"    
											@endif
											@endif
										>
											{!! $column['label'] !!}
										</th>
										@endforeach
	
										@if ( $crud->buttons()->where('stack', 'line')->count() )
										<th data-orderable="false" 
											data-priority="{{ $crud->getActionsColumnPriority() }}" 
											data-visible-in-export="false"
											>{{ trans('backpack::crud.actions') }}</th>
										@endif
									</tr>
									</thead>
									<tbody>
									</tbody>
									
								</table>
	
								@if ( $crud->buttons()->where('stack', 'bottom')->count() )
								<div id="bottom_buttons" class="d-print-none text-center text-sm-left">
									@include('crud::inc.button_stack', ['stack' => 'bottom'])
	
									<div id="datatable_button_stack" class="float-right text-right hidden-xs"></div>
								</div>
								@endif
	
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div>
	</div>
@endsection

@section('after_styles')
  <!-- DATA TABLES -->
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css') }}">
  <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/form.css') }}">
  <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/list.css') }}">

  <!-- CRUD LIST CONTENT - crud_list_styles stack -->
  @stack('crud_list_styles')
@endsection

@section('after_scripts')
  @include('crud::inc.datatables_logic')
  <script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
  <script src="{{ asset('packages/backpack/crud/js/form.js') }}"></script>
  <script src="{{ asset('packages/backpack/crud/js/list.js') }}"></script>

  
  <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
  @stack('crud_list_scripts')
@endsection


@section('footscript')
	@include('backpack::crud.device-position.leaflet')
	{{-- @include('backpack::crud.device-position.mapbox') --}}
@endsection
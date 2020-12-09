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
							<a href="{{ url($crud->route.'/create') }}" class="btn btn-sm btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}</span></a>&nbsp;
							<a href="{{ url($crud->route) }}" class="btn btn-sm btn-info"><i class="fa fa-angle-double-left"></i> Back To {{ ucwords($crud->entity_name_plural) }}</span></a><br><br>&nbsp;
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
								<form action="{{ url('admin/perangkatnilai-list') }}" method="GET">
									<div class="row">
										<div class="col-md-3">
											<input type="text" name="cari" class="form-control" placeholder="Search">
										</div>
										<div class="col-md-1">
											<button type="submit" class="btn btn-md btn-info"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								<table id="crudTable" class="table table-striped table-bordered mt-2" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Perangkat</th>
											<th>Tanggal</th>
											<th>Nilai</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php
											$no = 1;
										@endphp
										@foreach ($data as $item)
											<tr>
												<td class="text-center">{{ $no }}</td>
												<td class="text-left">{{ $item->nama_perangkat }}</td>
												<td class="text-center">{{ date('d-m-Y',strtotime($item->tanggal)) }}</td>
												<td class="text-right">{{ $item->nilai }}</td>
												<td class="text-left">{{ $item->keterangan }}</td>
												<td class="text-center">
													<div class="btn-group">
														<button type="button" class="btn btn-sm btn-primary">Action</button>
														<button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<div class="dropdown-menu">
																<a class="dropdown-item" href="{{ url($crud->route.'/'.$item->id.'/edit') }}"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="deleteEntry(this)" data-route="{{ url($crud->route.'/'.$item->id) }}" class="btn btn-sm btn-link" data-button-type="delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;{{ trans('backpack::crud.delete') }}</a>
														</div>
													</div>
												</td>
											</tr>
											@php
												$no++;
											@endphp
										@endforeach
									</tbody>
									
								</table>
								<div class="row">
									<div class="col-md-3">&nbsp;</div>
									{{-- <div class="col-md-6 text-center">{{ $data->links() }}</div> --}}
									<div class="col-md-6 text-center">{{$data->appends(request()->toArray())->links()}}</div>
									<div class="col-md-3">&nbsp;</div>
								</div>
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
  {{-- @include('crud::inc.datatables_logic') --}}
  <script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
  <script src="{{ asset('packages/backpack/crud/js/form.js') }}"></script>
  <script src="{{ asset('packages/backpack/crud/js/list.js') }}"></script>

  
  <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
  @stack('crud_list_scripts')

  <script>
	  function deleteEntry(button) {
		// ask for confirmation before deleting an item
		// e.preventDefault();
		var button = $(button);
		var route = button.attr('data-route');
		var row = $("#crudTable a[data-route='"+route+"']").closest('tr');

		Swal.fire({
				title: 'Are you sure?',
				text: "{{ trans('backpack::crud.delete_confirm') }}",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				reverseButtons: true
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: route,
						type: 'DELETE',
						success: function(result) {
							// Show an alert with the result
							// new PNotify({
							// 	title: "{{ trans('backpack::crud.delete_confirmation_title') }}",
							// 	text: "{{ trans('backpack::crud.delete_confirmation_message') }}",
							// 	type: "success"
							// });
							Swal.fire({
								icon: 'success',
								title: "{{ trans('backpack::crud.delete_confirmation_title') }}",
								text: "{{ trans('backpack::crud.delete_confirmation_message') }}",
								showConfirmButton: false,
								timer: 1500
							});

							// Hide the modal, if any
							$('.modal').modal('hide');

							// Remove the details row, if it is open
							if (row.hasClass("shown")) {
								row.next().remove();
							}

							// Remove the row from the datatable
							row.remove();
						},
						error: function(result) {
							// Show an alert with the result
							// new PNotify({
							// 	title: "{{ trans('backpack::crud.delete_confirmation_not_title') }}",
							// 	text: "{{ trans('backpack::crud.delete_confirmation_not_message') }}",
							// 	type: "warning"
							// });
							Swal.fire({
								icon: 'success',
								title: "{{ trans('backpack::crud.delete_confirmation_not_title') }}",
								text: "{{ trans('backpack::crud.delete_confirmation_not_message') }}",
								showConfirmButton: false,
								timer: 1500
							});
						}
					});
				}
				else if (result.dismiss === 'cancel') {
					// new PNotify({
					// 	title: "{{ trans('backpack::crud.delete_confirmation_not_deleted_title') }}",
					// 	text: "{{ trans('backpack::crud.delete_confirmation_not_deleted_message') }}",
					// 	type: "info"
					// });
					Swal.fire({
						icon: 'success',
						title: "{{ trans('backpack::crud.delete_confirmation_not_deleted_title') }}",
						text: "{{ trans('backpack::crud.delete_confirmation_not_deleted_message') }}",
						showConfirmButton: false,
						timer: 1500
					});
				}
			});
      }
  </script>
@endsection

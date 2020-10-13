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
						<div class="row">
							<div class="col-md-12">
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
							</div>
						</div>
						@endif
						<!-- load the view from the application if it exists, otherwise load the one in the package -->
						
						<div class="row">
							<div class="col-md-4">
								@if(view()->exists('vendor.backpack.crud.form_content'))
									@include('vendor.backpack.crud.form_content', ['fields' => $crud->fields(), 'action' => 'edit'])
								@else
									@include('crud::form_content', ['fields' => $crud->fields(), 'action' => 'edit'])
								@endif
							</div>
							<div class="col-md-5">
								<div class="card">
    								<div class="card-body row">
										<div class="form-group col-sm-12">    
											<label>Foto (*biarkan kosong jika tidak diganti)</label>
											<input type="file" name="foto" class="form-control" accept=".jpg,.png">
										</div>
										@foreach ($crud->param as $i => $item)
											<div class="form-group col-sm-7" style="margin-bottom: 2px !important;">    
												<label>Parameter {{ ($i+1) }}</label>
												<input type="text" class="form-control" readonly value="{{ $item->parametername->name }}">
											</div>
											<div class="form-group col-sm-5" style="margin-bottom: 2px !important;">    
												<label>&NonBreakingSpace;</label>
												<input type="text" class="form-control" readonly value="{{ $item->parameterunit->name }}">
											</div>
										@endforeach
										@for ($i = $crud->param->count(); $i <=($crud->param->count() + 5); $i++)	
											<div class="form-group col-sm-7" style="margin-bottom: 2px !important;">    
												<label>Parameter {{ $i }}</label>
												<select class="select2 form-control" name="parameter[]">
													<option value="">-Pilih Parameter-</option>
													@foreach ($crud->parameter as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group col-sm-5" style="margin-bottom: 2px !important;">    
												<label>&nbsp;</label>
												<select class="select2 form-control" name="unit[]">
													<option value="">-Pilih Satuan-</option>
													@foreach ($crud->unit as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
										@endfor
    								</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-body row">
										<div class="form-group col-sm-12">    
											<label>Foto</label>
										</div>
										<div class="form-group col-sm-12">  
											@if ($crud->image)
												<img src="{{ url('show-file/'.$crud->image->image_path) }}" style="width:100%">
											@else
												n/a
											@endif  
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							@include('crud::inc.form_save_buttons')
						</div>
					</form>
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
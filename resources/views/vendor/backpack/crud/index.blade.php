@extends('backpack::layouts.master')

@section('title')
	<title>Dashboard - Bendungan Hebat</title>
	<style>
		td {
			font-size: 12px !important;
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
						<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Dashboard</h2>
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
				
				<div class="row">
					<div class="col-md-6">
						<div class="card card-custom gutter-b">
							<div class="card-header">
								<div class="card-title">
									<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Shopping\Chart-pie.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
											<path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
										</g>
									</svg><!--end::Svg Icon--></span>
									<h3 class="card-label ml-3">Grafik Status Perangkat</h3>
								</div>
							</div>
							<div class="card-body">
								<div id="chart_12" class="d-flex justify-content-center"></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-custom gutter-b">
							<div class="card-header">
								<div class="card-title">
									<span class="svg-icon svg-icon-warning svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Shopping\Chart-pie.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
											<path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
										</g>
									</svg><!--end::Svg Icon--></span>
									<h3 class="card-label ml-3">Grafik Status Petugas</h3>
								</div>
							</div>
							<div class="card-body">
								<div id="chart_12_b" class="d-flex justify-content-center"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card card-custom gutter-b">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label ml-3">Daftar Perangkat</h3>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th>Nama Perangkat</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="">Perangkat 1</a></td>
											<td><span class="badge badge-danger">Tidak Aktif</span></td>
										</tr>
										
										<tr>
											<td><a href="">Perangkat 2</a></td>
											<td><span class="badge badge-success">Aktif</span></td>
										</tr>
										
										<tr>
											<td><a href="">Perangkat 3</a></td>
											<td><span class="badge badge-success">Aktif</span></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-custom gutter-b">
							<div class="card-header">
								<div class="card-title">
									
									<h3 class="card-label ml-3">Daftar Petugas</h3>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="">Petugas 1</a></td>
											<td>
												<span class="badge badge-success">Aktif</span>
											</td>
										</tr>
										
										<tr>
											<td><a href="">Petugas 2</a></td>
											<td>
												<span class="badge badge-success">Aktif</span>
											</td>
										</tr>
										<tr>
											<td><a href="">Petugas 3</a></td>
											<td>
												<span class="badge badge-danger">Tidak Aktif</span>
											</td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Container-->
		</div>
	</div>
@endsection

@section('footscript')
	<script src="{{asset('/')}}/js/pages/features/charts/apexcharts.js?v=7.0.4"></script>
	<script src="{{asset('/')}}/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4"></script>
	<script src="{{asset('/')}}/plugins/custom/gmaps/gmaps.js?v=7.0.4"></script>
	{{-- <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM?v=7.0.4"></script> --}}
@endsection
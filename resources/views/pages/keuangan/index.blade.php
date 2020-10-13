@extends('layouts.master')

@section('title')
	<title>Dashboard - Keuangan Daerah</title>
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
						<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Keuangan Daerah</h2>
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
				<div class="row mb-8">
					<div class="col-md-4">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
							<div class="card-body">
								<div class="d-flex align-items-center p-5">
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"><sup>Rp.</sup> 567.341.467.648,-</a>
										<div class="text-dark-75">Total Pendapatan</div>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class="col-md-4">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
							<div class="card-body">
								<div class="d-flex align-items-center p-5">
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"><sup>Rp.</sup> 1.193.604.703.749,-</a>
										<div class="text-dark-75">Total Belanja</div>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class="col-md-4">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
							<div class="card-body">
								<div class="d-flex align-items-center p-5">
									<!--end::Icon-->
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"><sup>Rp.</sup> 626.263.236.101,-</a>
										<div class="text-dark-75">Total Silpa</div>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
				</div>
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
									<h3 class="card-label ml-3">Grafik Pendapatan</h3>
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
									<h3 class="card-label ml-3">Grafik Belanja</h3>
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
									<span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Navigation\Arrow-down.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<rect fill="#000000" opacity="0.3" x="11" y="5" width="2" height="14" rx="1"/>
											<path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999) "/>
										</g>
									</svg><!--end::Svg Icon--></span>
									<h3 class="card-label ml-3">OPD Dengan Serapan Anggaran Terendah</h3>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th>OPD</th>
											<th>Persentase</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="">Dinas Perumahan, Pemukiman, dan Pemakaman</a></td>
											<td><span class="badge badge-danger">0.63 %</span></td>
										</tr>
										<tr>
											<td><a href="">Dinas Tata Ruang dan Bangunan</a></td>
											<td><span class="badge badge-danger">2.12 %</span></td>
										</tr>
										<tr>
											<td><a href="">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</a></td>
											<td><span class="badge badge-danger">3.35 %</span></td>
										</tr>
										<tr>
											<td><a href="">Dinas Perhubungan</a></td>
											<td><span class="badge badge-danger">4.84 %</span></td>
										</tr>
										<tr>
											<td><a href="">Kantor Kesatuan Bangsa dan Politik</a></td>
											<td><span class="badge badge-danger">5.66 %</span></td>
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
									<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Navigation\Arrow-up.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<rect fill="#000000" opacity="0.3" x="11" y="5" width="2" height="14" rx="1"/>
											<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
										</g>
									</svg><!--end::Svg Icon--></span>
									<h3 class="card-label ml-3">OPD Dengan Serapan Anggaran Tertinggi</h3>
								</div>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th>OPD</th>
											<th>Persentase</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="">Badan Pengelola Keuangan dan Aset Daerah</a></td>
											<td>
												<span class="badge badge-success">34.71 %</span>
											</td>
										</tr>
										<tr>
											<td><a href="">RSU Kabupaten Tangerang</a></td>
											<td>
												<span class="badge badge-success">26.93 %</span>
											</td>
										</tr>
										<tr>
											<td><a href="">Badan Pendapatan Daerah</a></td>
											<td>
												<span class="badge badge-success">20.02 %</span>
											</td>
										</tr>
										<tr>
											<td><a href="">Dinas Kesehatan</a></td>
											<td>
												<span class="badge badge-success">19.86 %</span>
											</td>
										</tr>
										<tr>
											<td><a href="">RSUD Balaraja</a></td>
											<td>
												<span class="badge badge-success">19.4 %</span>
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
	<script src="assets/js/pages/features/charts/apexcharts.js?v=7.0.4"></script>
@endsection
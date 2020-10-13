@extends('layouts.master')

@section('title')
	<title>Dashboard - Rumah Sakit</title>
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
						<h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">Rumah Sakit</h2>
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
                    <div class="col-md-12">
                        <div class="alert alert-white alert-shadow fade show gutter-b p-lg-8" role="alert">
                            <div class="mb-5">
                                Silakan pilih modul data berikut ini :
                            </div>
                            <div>
                                <a href="" class="btn btn-primary mr-3">RSUD Balaraja</a>
                                <a href="" class="btn btn-default mr-3">RSUD Pakuhaji</a>
                                <a href="" class="btn btn-default mr-3">RSU Kabupaten Tangerang</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-8">
					<div class="col-md-4">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate-slow wave-info mb-8 mb-lg-0">
							<div class="card-body">
								<div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-info svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Home\Bed.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,22 L2,22 C2,19.2385763 4.23857625,18 7,18 L17,18 C19.7614237,18 22,19.2385763 22,22 L20,22 C20,20.3431458 18.6568542,20 17,20 L7,20 C5.34314575,20 4,20.3431458 4,22 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <rect fill="#000000" x="1" y="14" width="22" height="6" rx="1"/>
                                                <path d="M13,13 L11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 L6,11 C5.44771525,11 5,11.4477153 5,12 L5,13 L4,13 C3.44771525,13 3,12.5522847 3,12 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12 C21,12.5522847 20.5522847,13 20,13 L19,13 L19,12 C19,11.4477153 18.5522847,11 18,11 L14,11 C13.4477153,11 13,11.4477153 13,12 L13,13 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">423</a>
										<div class="text-dark-75">Kapasitas Kamar</div>
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
									<div class="mr-6">
                                        <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Home\Bed.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,22 L2,22 C2,19.2385763 4.23857625,18 7,18 L17,18 C19.7614237,18 22,19.2385763 22,22 L20,22 C20,20.3431458 18.6568542,20 17,20 L7,20 C5.34314575,20 4,20.3431458 4,22 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <rect fill="#000000" x="1" y="14" width="22" height="6" rx="1"/>
                                                <path d="M13,13 L11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 L6,11 C5.44771525,11 5,11.4477153 5,12 L5,13 L4,13 C3.44771525,13 3,12.5522847 3,12 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12 C21,12.5522847 20.5522847,13 20,13 L19,13 L19,12 C19,11.4477153 18.5522847,11 18,11 L14,11 C13.4477153,11 13,11.4477153 13,12 L13,13 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">380</a>
										<div class="text-dark-75">Kamar Terpakai Hari Ini</div>
									</div>
									<!--end::Content-->
								</div>
							</div>
						</div>
						<!--end::Callout-->
					</div>
					<div class="col-md-4">
						<!--begin::Callout-->
						<div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
							<div class="card-body">
								<div class="d-flex align-items-center p-5">
									<div class="mr-6">
                                        <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Home\Bed.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,22 L2,22 C2,19.2385763 4.23857625,18 7,18 L17,18 C19.7614237,18 22,19.2385763 22,22 L20,22 C20,20.3431458 18.6568542,20 17,20 L7,20 C5.34314575,20 4,20.3431458 4,22 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <rect fill="#000000" x="1" y="14" width="22" height="6" rx="1"/>
                                                <path d="M13,13 L11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 L6,11 C5.44771525,11 5,11.4477153 5,12 L5,13 L4,13 C3.44771525,13 3,12.5522847 3,12 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12 C21,12.5522847 20.5522847,13 20,13 L19,13 L19,12 C19,11.4477153 18.5522847,11 18,11 L14,11 C13.4477153,11 13,11.4477153 13,12 L13,13 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
									<!--begin::Content-->
									<div class="d-flex flex-column">
										<a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">803</a>
										<div class="text-dark-75">Kamar Tersedia Hari Ini</div>
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
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Grafik Jumlah Pengunaan Kamar Rawat Inap 7 Hari Terakhir</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart_4"></div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Grafik Jumlah Pengunaan UGD 7 Hari Terakhir</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart_5"></div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

                <div class="row">
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
                                    <h3 class="card-label ml-3">Diagnosa Penyakit Terbanyak Bulan Ini</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
									<thead>
										<tr>
											<th>Diagnosis</th>
											<th>Rawat Inap</th>
											<th>Rawat Jalan</th>
											<th>Total Pasien</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="">Dyspnoea</a></td>
											<td><span class="badge badge-primary">7 Pasien</span></td>
											<td><span class="badge badge-warning text-white">18 Pasien</span></td>
											<td><span class="badge badge-dark">25 Pasien</span></td>
                                        </tr>
                                        <tr>
											<td><a href="">Epilepsy</a></td>
											<td><span class="badge badge-primary">9 Pasien</span></td>
											<td><span class="badge badge-warning text-white">8 Pasien</span></td>
											<td><span class="badge badge-dark">17 Pasien</span></td>
										</tr>
										<tr>
											<td><a href="">	Acute subendocardial myocardial infarction</a></td>
											<td><span class="badge badge-primary">5 Pasien</span></td>
											<td><span class="badge badge-warning text-white">7 Pasien</span></td>
											<td><span class="badge badge-dark">12 Pasien</span></td>
										</tr>
										<tr>
											<td><a href="">Labour and delivery complicated by fetal stress, unspecified</a></td>
											<td><span class="badge badge-primary">10 Pasien</span></td>
											<td><span class="badge badge-warning text-white">3 Pasien</span></td>
											<td><span class="badge badge-dark">12 Pasien</span></td>
                                        </tr>
                                        <tr>
											<td><a href="">Anaemia, unspecified</a></td>
											<td><span class="badge badge-primary">4 Pasien</span></td>
											<td><span class="badge badge-warning text-white">6 Pasien</span></td>
											<td><span class="badge badge-dark">10 Pasien</span></td>
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
                                    <span class="svg-icon svg-icon-warning svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo3\dist/../src/media/svg/icons\Shopping\Chart-pie.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
											<path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
										</g>
									</svg><!--end::Svg Icon--></span>
                                    <h3 class="card-label ml-3">Grafik Pengguna JKN Bulan Ini</h3>
                                </div>
                            </div>
                            <div class="card-body">
								<div id="chart_12" class="d-flex justify-content-center"></div>
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
    <script>
        "use strict";

        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        var KTApexChartsDemo = function () {
            
            var _demo12 = function () {
                const apexChart = "#chart_12";
                var options = {
                    series: [2510, 567],
                    chart: {
                        width: 420,
                        type: 'pie',
                    },
                    labels: ['JKN', 'Non JKN'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [success, warning]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo4 = function () {
                const apexChart = "#chart_4";
                var options = {
                    series: [{
                        name: 'Kelas 1',
                        data: [44, 55, 41, 37, 22, 43, 21]
                    }, {
                        name: 'Kelas 2',
                        data: [53, 32, 33, 52, 13, 43, 32]
                    }, {
                        name: 'Kelas 3',
                        data: [12, 17, 11, 9, 15, 11, 20]
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        stacked: true,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                        },
                    },
                    stroke: {
                        width: 1,
                        colors: ['#fff']
                    },
                    xaxis: {
                        categories: ["16 Jul", "15 Jul", "14 Jul", "13 Jul", "12 Jul", "10 Jul", "09 Jul"],
                        labels: {
                            formatter: function (val) {
                                return val
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: undefined
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Pasien"
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                        offsetX: 40
                    },
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo5 = function () {
                const apexChart = "#chart_5";
                var options = {
                    series: [{
                        name: 'ICU',
                        data: [44, 55, 41, 37, 22, 43, 21]
                    }, {
                        name: 'NICU',
                        data: [53, 32, 33, 52, 13, 43, 32]
                    }, {
                        name: 'PSA',
                        data: [12, 17, 11, 9, 15, 11, 20]
                    }, {
                        name: 'PSE',
                        data: [12, 17, 11, 9, 15, 11, 20]
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        stacked: true,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                        },
                    },
                    stroke: {
                        width: 1,
                        colors: ['#fff']
                    },
                    xaxis: {
                        categories: ["16 Jul", "15 Jul", "14 Jul", "13 Jul", "12 Jul", "10 Jul", "09 Jul"],
                        labels: {
                            formatter: function (val) {
                                return val
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: undefined
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Pasien"
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                        offsetX: 40
                    },
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }


            return {
                init: function () {
                    _demo4();
                    _demo5();
                    _demo12();
                }
            };

        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });
    </script>
@endsection
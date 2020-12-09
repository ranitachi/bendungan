<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
        'prefix'     => config('backpack.base.route_prefix', 'admin'),
        'middleware' => array_merge(
            (array) config('backpack.base.web_middleware', 'web'),
            (array) config('backpack.base.middleware_key', 'admin')
        ),
        'namespace'  => 'App\Http\Controllers\Admin',
    ], function () { // custom admin routes

    //Device
    Route::crud('devicetype', 'DeviceTypeCrudController');
    Route::crud('device', 'DeviceCrudController');
    Route::crud('devicepropertyunit', 'DevicePropertyUnitCrudController');
    Route::crud('devicepropertyname', 'DevicePropertyNameCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('devicepropertyvaloelog', 'DevicePropertyValoeLogCrudController');
    Route::crud('deviceposition', 'DevicePositionCrudController');
    Route::crud('reportstatus', 'ReportStatusCrudController');
    Route::crud('reportschedule', 'ReportScheduleCrudController');
    Route::crud('bucketfile', 'BucketFileCrudController');
    Route::crud('laporanpendataan', 'LaporanPendataanCrudController');
    Route::crud('perangkatnilai', 'PerangkatNilaiCrudController');
    Route::get('perangkatnilai-list', 'PerangkatNilaiCrudController@list')->name('perangkatnilai.list');
    Route::post('perangkatnilai-grafik', 'PerangkatNilaiCrudController@grafik');
}); // this should be the absolute last line of this file
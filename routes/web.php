<?php

use App\Models\Device;
use App\Exports\LaporanPendataan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect('admin/login');
})->name('home');

Route::get('/device-atrribute', function(){
    $data = array();
    $device = Device::all();

    $feature = array();

    $data['type'] = "FeatureCollection";
    $x = 0;
    foreach($device as $index => $value)
    {
        $feature[$x]["type"] = "Feature";
        $feature[$x]["properties"] = array(
                    "marker-color" =>  "#7e7e7e",
                    "marker-size" =>  "large",
                    "marker-symbol" =>  "",
                    "popupContent" =>  $value->name,
                    "status" =>  $value->status_device
                );
        $feature[$x]["geometry"]= array(
                    "type" => "Point",
                    "coordinates" => array($value->longitude,$value->latitude)
            );
        
        $x++;
    }
    $data['features'] = $feature;
    return $data;
    
})->name('device-attribute');

Route::get('show-file/{f1}/{f2}/{f3}/{f4}/{f5}',function($f1,$f2,$f3,$f4,$f5){
    $file = $f1.'/'.$f2.'/'.$f3.'/'.$f4.'/'.$f5;
    return response()->file(storage_path('app').'/public/'.$file);
});

Route::post('export-laporan','Admin\LaporanPendataanCrudController@export_laporan');
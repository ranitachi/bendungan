<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceProperty extends Model
{
    use SoftDeletes;
    protected $table='device_properties';

    function parametername()
    {
        return $this->belongsTo('App\Models\DevicePropertyName','device_property_name_id');
    }
    function parameterunit()
    {
        return $this->belongsTo('App\Models\DevicePropertyUnit','device_property_unit_id');
    }

}

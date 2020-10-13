<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceImage extends Model
{
    use SoftDeletes;
    protected $table = 'device_images';

    public function getFotoDeviceAttribute()
    {
        return '<img src="'.url('show-file/'.$this->attributes['image_path']).'" style="height:200px;">';
    }
}

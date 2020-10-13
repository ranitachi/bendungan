<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DeviceType extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    
    use SoftDeletes;
    protected $table = 'device_types';
    protected $fillable = ['type','created_at','updated_at','deleted_at'];
    // public $timestamps = false;

    public function getCreatedAtAttribute()
    {
        return date('d-m-Y H:i:s',strtotime($this->attributes['created_at']));
    }
}

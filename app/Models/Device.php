<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use SoftDeletes;
    protected $table = 'devices';
    protected $fillable = ['name','description','code','status','latitude','longitude','device_type_id'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    
    function dev_type()
    {
        return $this->belongsTo('App\Models\DeviceType','device_type_id');
    }

    function getDeviceTypeAttribute()
    {
        if(isset($this->dev_type->type))
            return '<span class="badge badge-info">'.$this->dev_type->type.'</span>';
        else
            return 'n/s';
    }
    public function getStatusDeviceAttribute()
    {
        if($this->attributes['status']==1)
            return '<span class="badge badge-info badge-outline">Aktif</span>';
        elseif($this->attributes['status']==2)
            return '<span class="badge badge-warning badge-outline">Maintenance</span>';
        else
            return '<span class="badge badge-danger badge-outline">Tidak Aktif</span>';
    }
    public function getDStatusDeviceAttribute()
    {
        if($this->attributes['status']==1)
            return 'Aktif';
        elseif($this->attributes['status']==2)
            return 'Maintenance';
        else
            return 'Tidak Aktif';
    }
}

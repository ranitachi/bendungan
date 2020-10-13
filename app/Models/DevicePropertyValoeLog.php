<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class DevicePropertyValoeLog extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'device_properties_value_logs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    function parametername()
    {
        return $this->belongsTo('App\Models\DevicePropertyName','device_property_name_id');
    }
    function parameterunit()
    {
        return $this->belongsTo('App\Models\DevicePropertyUnit','device_property_unit_id');
    }
    function device()
    {
        return $this->belongsTo('App\Models\Device','device_id');
    }
    function petugas()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    // function schedule()
    // {
    //     return $this->belongsTo('App\Models\Schedule','schedule_id');
    // }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    function getNamaPerangkatAttribute()
    {
        if(isset($this->device->name))
            return '<b>'.$this->device->name.'</b>';
        else
            return 'n/a';
    }
    function getNamaPetugasAttribute()
    {
        if(isset($this->petugas->name))
            return '<b>'.$this->petugas->name.'</b>';
        else
            return 'n/a';
    }
    // function getCreatedAtAttribute()
    // {
    //     return date('');
    // }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}

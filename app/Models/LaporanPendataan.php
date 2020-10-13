<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class LaporanPendataan extends Model
{
    use CrudTrait;

    protected $table = 'reporting_schedules';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['device_id','user_id','scheduled_at','start_at','done_at','reporting_status'];
    protected $hidden = ['deleted_at','created_at','updated_at'];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    // function namapetugas()
    // {
    //     $petugas = User::where('level',4)->get();
    //     return $petugas;
    // }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    function device()
    {
        return $this->belongsTo('App\Models\Device','device_id');
    }
    function petugas()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    function status()
    {
        return $this->belongsTo('App\Models\ReportStatus','reporting_status');
    }
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
    function getStatusReportAttribute()
    {
        if(isset($this->status->name))
            if(strpos(strtolower($this->status->name),'belum') !== false)
                return '<span class="badge badge-warning badge-outline text-white">'.$this->status->name.'</span>';
            elseif(strpos(strtolower($this->status->name),'sedang') !== false)
                return '<span class="badge badge-info badge-outline text-white">'.$this->status->name.'</span>';
            elseif(strpos(strtolower($this->status->name),'selesai') !== false)
                return '<span class="badge badge-success badge-outline text-white">'.$this->status->name.'</span>';
        else
            return '<span class="badge badge-danger badge-outline">n/a</span>';
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerangkatNilai extends Model
{
    use CrudTrait,SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'table_nilai_perangkat';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function perangkat()
    {
        return $this->belongsTo('App\Models\Device','perangkat_id');
    }
    public function typeperangkat()
    {
        return $this->belongsTo('App\Models\DeviceType','device_type_id');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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
    public function tableList($crud = false)
    {
        return '<a class="btn btn-sm btn-warning" href="'.route('perangkatnilai.list').'" data-toggle="tooltip" title="List Nilai"><i class="fa fa-list"></i> List Nilai Perangkat</a>';
    }
    
    public function getGetNamaPerangkatAttribute()
    {
        if(isset($this->perangkat->name))
        {
            return $this->perangkat->name;
        }
        else
            return '-';
    }
    public function getGetTypePerangkatAttribute()
    {
        if(isset($this->typeperangkat->type))
        {
            return $this->typeperangkat->type;
        }
        else
            return '-';
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setTanggalExcelAttribute($value)
    {
        $date = ((int)$value - 25569) * 86400;
        $this->attributes['tanggal'] = date('Y-m-d',$date);
        $this->attributes['tanggal_excel'] = $date;
    }
    public function setTanggalAttribute($value)
    {
        // $date = ((int)$value - 25569) * 86400;
        $date = strtotime($value);
        $this->attributes['tanggal'] = $value;
        $this->attributes['tanggal_excel'] = $date;
    }
}

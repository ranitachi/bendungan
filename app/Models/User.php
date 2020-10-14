<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class User extends Model
{
    use CrudTrait;
    use SoftDeletes;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'users';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name','email','email_verified_at','password','remember_token','avatar','digest','directory_data','status','ktp','no_handphone','no_telepon','alamat','gender','foto','level'];
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
    function level_user()
    {
        return $this->belongsTo('App\Models\User','level');
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
    public function getStatusUserAttribute()
    {
        if($this->attributes['status']==1)
            return '<span class="badge badge-info badge-outline">Aktif</span>';
        else
            return '<span class="badge badge-danger badge-outline">Tidak Aktif</span>';
    }
    public function getKontakAttribute()
    {
        $kontak = '';

        if($this->attributes['no_handphone']!='')
            $kontak .= '<i class="fas fa-mobile-alt"></i> : '.$this->attributes['no_handphone'].'<br>';

        if($this->attributes['no_telepon']!='')
            $kontak .= '<i class="fas fa-phone-square-alt"></i> : '.$this->attributes['no_telepon'];

        return $kontak;
    }

    public function getKelaminAttribute()
    {
        if($this->attributes['gender']=='L')
            return '<span class="badge badge-info badge-outline text-center style="color:#fff"><i class="text-white fas fa-mars"></i></span>';
        else
            return '<span class="badge badge-danger badge-outline text-center style="color:#fff"><i class="text-white fas fa-venus"></i></span>';
    }

    public function getLevelUserAttribute()
    {
        $role = Role::find($this->attributes['level']);

        if($this->attributes['level']==1)
            return '<span class="badge badge-info badge-outline text-center style="color:#fff">'.$role->name.'</span>';
        elseif($this->attributes['level']==2)
            return '<span class="badge badge-success badge-outline text-center style="color:#fff">'.$role->name.'</span>';
        elseif($this->attributes['level']==3)
            return '<span class="badge badge-danger badge-outline text-center style="color:#fff">'.$role->name.'</span>';
        elseif($this->attributes['level']==4)
            return '<span class="badge badge-warning badge-outline text-center style="color:#fff">'.$role->name.'</span>';
        else
            return '<span class="badge badge-secondary badge-outline text-center style="color:#fff">n/a</span>';
    }
    
    public function getAvatarUserAttribute()
    {
        return '<img src="'.url('show-file/'.$this->attributes['foto']).'" style="height:200px;">';
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
        return $this->attributes['password'];
    }
    
    public function setFotoAttribute($value)
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

        // if($value!=null)
        // {
            $image               = $value;
            $filename            = $image->getClientOriginalName();
            $fileExtension       = $image->extension();
            $originalImagePath   = \Image::make($image->getRealPath());
            
            $uniqueName = $this->id.'-'.uniqid() . time();
    
            $mediumObject   = $originalImagePath;
            $mediumObject->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            $mediumSizePath     = 'avatar/' . $year . '/' . $month . '/' . $day . '/' . $uniqueName . '.' . $fileExtension;
            Storage::disk('public')->put($mediumSizePath, (string)$mediumObject->encode() );
            
            $this->attributes['foto'] = $mediumSizePath;
    
            return $this->attributes['foto'];
        // }
    }
}

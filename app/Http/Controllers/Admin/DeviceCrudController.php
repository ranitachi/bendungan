<?php

namespace App\Http\Controllers\Admin;

use DB;
use Session;
use Storage;
use App\Models\Device;
use App\Models\DeviceImage;
use App\Models\DeviceProperty;
use App\Models\DevicePropertyName;
use App\Models\DevicePropertyUnit;
use Illuminate\Http\Request;
use App\Http\Requests\DeviceRequest;
use App\Http\Requests\DeviceRequest as StoreRequest;
use App\Http\Requests\DeviceRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class DeviceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Device::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/device');
        CRUD::setEntityNameStrings('Device', 'Device');

        $this->crud->setCreateView('backpack::crud.device.create');
        $this->crud->setEditView('backpack::crud.device.edit');

        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        $this->crud->enableIndexColumn();

        $parameter = DevicePropertyName::where('status',1)->get();
        $unit = DevicePropertyUnit::where('status',1)->get();

        $this->crud->parameter = $parameter;
        $this->crud->unit = $unit;
        $this->crud->show = 0;
        $this->crud->delete = 1;
    }

    
    public function store(StoreRequest $request)
    {
        try{
            DB::beginTransaction();
            $item = CRUD::create($request->toArray());
        
            $device_id = $item->id;

            $parameter = $request->parameter;
            $unit = $request->unit;
            foreach($parameter as $index => $value)
            {
                if($value!=null && $value!='')
                {
                    $param = new DeviceProperty;
                    $param->device_id = $value;
                    $param->device_property_name_id = $value;
                    $param->device_property_unit_id = $unit[$index];
                    $param->description = '-';
                    $param->save();
                }
            }

            
            if($request->hasFile('foto'))
            {
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $image               = $request->foto;
                $filename            = $image->getClientOriginalName();
                $fileExtension       = $image->extension();
                $originalImagePath   = \Image::make($image->getRealPath());
                
                $uniqueName = $device_id.'-'.uniqid() . time();
        
                $mediumObject   = $originalImagePath;
                $mediumObject->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                
                $mediumSizePath     = 'device/' . $year . '/' . $month . '/' . $day . '/' . $uniqueName . '.' . $fileExtension;
                Storage::disk('public')->put($mediumSizePath, (string)$mediumObject->encode());

                $dev_img = new DeviceImage;
                $dev_img->device_id = $device_id;
                $dev_img->image_name = $uniqueName;
                $dev_img->image_path = $mediumSizePath;
                $dev_img->save();
            }

            \Alert::success(trans('backpack::crud.insert_success'))->flash();

            CRUD::setSaveAction();
            DB::commit();
            return CRUD::performSaveAction($item->getKey());
        }
        catch(Exception $ex)
        {
            DB::rollback();
            Session::flash('error','Insert Failed');
            return $request->http_referrer;
        }

    }
    public function update(UpdateRequest $request)
    {
        // return $request->all();
        $id = $request->id;
        try{
            DB::beginTransaction();
            // $item = CRUD::update($id,$request->toArray());
            // $device_id = $item->id;
            
            $response = $this->traitUpdate();

            $parameter = $request->parameter;
            $unit = $request->unit;
            foreach($parameter as $index => $value)
            {
                if($value!=null && $value!='')
                {
                    $param = new DeviceProperty;
                    $param->device_id = $value;
                    $param->device_property_name_id = $value;
                    $param->device_property_unit_id = $unit[$index];
                    $param->description = '-';
                    $param->save();
                }
            }

            
            if($request->hasFile('foto'))
            {
                DeviceImage::where('device_id',$id)->first()->delete();

                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $image               = $request->foto;
                $filename            = $image->getClientOriginalName();
                $fileExtension       = $image->extension();
                $originalImagePath   = \Image::make($image->getRealPath());
                
                $uniqueName = $device_id.'-'.uniqid() . time();
        
                $mediumObject   = $originalImagePath;
                $mediumObject->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                
                $mediumSizePath     = 'device/' . $year . '/' . $month . '/' . $day . '/' . $uniqueName . '.' . $fileExtension;
                Storage::disk('public')->put($mediumSizePath, (string)$mediumObject->encode());

                $dev_img = new DeviceImage;
                $dev_img->device_id = $device_id;
                $dev_img->image_name = $uniqueName;
                $dev_img->image_path = $mediumSizePath;
                $dev_img->save();
            }

            DB::commit();
            return $response;
        }
        catch(Exception $ex)
        {
            DB::rollback();
            Session::flash('error','Update Failed');
            return $request->http_referrer;
        }
    }
   
    protected function setupListOperation()
    {
        CRUD::removeButton('delete');
        CRUD::removeButton('show');

        CRUD::enableDetailsRow();
        CRUD::orderBy('device_type_id','asc');
        CRUD::orderBy('name','asc');
        CRUD::addColumn([   
                'label' => 'Nama Perangkat',
                'name' => 'name',
            ]);
        CRUD::addColumn([    
                'label' => 'Nilai Level',
                'name' => 'nilai_level',
            ]);
        CRUD::addColumn([    
                'label' => 'Keterangan',
                'name' => 'description',
            ]);
        CRUD::addColumn([   
                'label' => 'Kode Perangkat',
                'name' => 'code',
            ]);
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['1' => 'Aktif', '0' => 'Tidak Aktif','2'=>'Maintenance','3'=>'Rusak'],
        ]);
        CRUD::addColumn([
                'name' => 'device_type',
                'label' => 'Tipe Perangkat',
                'type' => 'closure',
                'function' => function($entry) {
                        return $entry->device_type;
                    }
              ]);
    }

    public function showDetailsRow($id)
    {
        $device = Device::find($id);
        $parameter = DeviceProperty::where('device_id',$id)->with('parametername')->with('parameterunit')->get();
        $image = DeviceImage::where('device_id',$id)->first();
        return view('backpack::crud.device.details_row', compact('device','parameter','image'));
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(DeviceRequest::class);

        CRUD::addField([
                'label' => 'Nama Perangkat',
                'name' => 'name',
            ]);
        CRUD::addField([
                'label' => 'Nilai Level',
                'name' => 'nilai_level',
            ]);
        CRUD::addField([
                'label' => 'Keterangan',
                'name' => 'description',
            ]);
        CRUD::addField([
                'label' => 'Kode Perangkat',
                'name' => 'code',
            ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => ['1' => 'Aktif', '0' => 'Tidak Aktif','2'=>'Maintenance','3'=>'Rusak'],
            'allows_null' => true,
        ]);
        CRUD::addField([
                'label' => 'Tipe Perangkat',
                'type' => 'select2',
                'name' => 'device_type_id',
                'entity' => 'dev_type',
                'attributes' => ['step' => 'any'],
                'allows_null' => false,
            ]);

    }

    protected function setupUpdateOperation()
    {
        $id = $this->crud->getCurrentEntryId();
        $param = DeviceProperty::where('device_id',$id)->with('parametername')->with('parameterunit')->get();
        $image = DeviceImage::where('device_id',$id)->first();
        
        $this->crud->param = $param;
        $this->crud->image = $image;

        $this->setupCreateOperation();
    }

    public function get_by_id(Request $request, $id)
    {
        $get = Device::where('device_type_id',$id)->orderBy('name')->get();
        $response = array();
        foreach($get as $val){
            $response[] = array(
                "id"=>$val->id,
                "text"=>$val->name
            );
        }

        echo json_encode($response);
        exit;
    }

    public function show($id)
    {
        return Device::find($id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\DevicePropertyValoeLog;
use App\Http\Requests\DevicePropertyValoeLogRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DevicePropertyValoeLogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DevicePropertyValoeLogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\DevicePropertyValoeLog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/devicepropertyvaloelog');
        CRUD::setEntityNameStrings('Riwayat Pendataan', 'Riwayat Pendataan');
        
        $this->crud->delete = 0;
        $this->crud->show = 0;

        $this->crud->enableIndexColumn();
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::removeButton('delete');
        CRUD::removeButton('show');
        CRUD::removeButton('update');
        CRUD::removeButton('create');
        // CRUD::groupBy('device_id');
        CRUD::addColumn([
                  'name' => 'nama_perangkat',
                  'label' => 'Nama Perangkat',
                  'type' => 'closure',
                    'function' => function($entry) {
                        return $entry->nama_perangkat;
                    }
              ]);
        CRUD::addColumn([
                  'name' => 'nama_petugas',
                  'label' => 'Nama Petugas',
                  'type' => 'closure',
                    'function' => function($entry) {
                        return $entry->nama_petugas;
                    }
              ]);
        CRUD::addColumn([
                  'name' => 'created_at',
                  'label' => 'Tanggal Pendataan',
                  'type' => 'date',
              ]);
        CRUD::enableDetailsRow();
    }
    public function showDetailsRow($id)
    {
        $get = DevicePropertyValoeLog::find($id);
        $device_id = $get->device_id;
        $history = DevicePropertyValoeLog::where('device_id',$device_id)->with('parametername')->with('parameterunit')->get();
        return view('backpack::crud.device.history', compact('get','device_id','history'));
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DevicePropertyValoeLogRequest::class);
        CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

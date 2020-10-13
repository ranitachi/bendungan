<?php

namespace App\Http\Controllers\Admin;

use App\Models\DevicePropertyUnit;
use App\Http\Requests\DevicePropertyUnitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\DevicePropertyUnitRequest as StoreRequest;
use App\Http\Requests\DevicePropertyUnitRequest as UpdateRequest;

/**
 * Class DevicePropertyUnitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DevicePropertyUnitCrudController extends CrudController
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
        CRUD::setModel(\App\Models\DevicePropertyUnit::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/devicepropertyunit');
        CRUD::setEntityNameStrings('Device Property Unit', 'Device Property Units');

        $this->crud->show = 0;
        $this->crud->delete = 1;
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

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
        CRUD::addColumn([
            'label' => 'Unit',
            'name' => 'name',
            'type' => 'text'
        ]);
        CRUD::addColumn([
            'label' => 'Simbol',
            'name' => 'symbol',
            'type' => 'text'
        ]);
        CRUD::addColumn([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'closure',
            'function' => function($entry) {
                return $entry->status_device;
            }
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DevicePropertyUnitRequest::class);
        CRUD::addField([
            'label' => 'Unit',
            'name' => 'name',
            'type' => 'text'
        ]);
        CRUD::addField([
            'label' => 'Simbol',
            'name' => 'symbol',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array',
            'options' => ['1' => 'Aktif', '0' => 'Tidak Aktif'],
            'allows_null' => true,
        ]);
       
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        // $this->setupCreateOperation();
        $id = $this->crud->getCurrentEntryId();
        $deviceUnit = DevicePropertyUnit::find($id);

        CRUD::setValidation(DevicePropertyUnitRequest::class);

        CRUD::addField([
            'label' => 'Unit',
            'name' => 'name',
            'type' => 'text'
        ]);
        CRUD::addField([
            'label' => 'Simbol',
            'name' => 'symbol',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array',
            'options' => [1 => 'Aktif', 0 => 'Tidak Aktif'],
            'value' => $deviceUnit->status,
        ]);
    }
}

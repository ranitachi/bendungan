<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DevicePositionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\DevicePositionRequest as StoreRequest;
use App\Http\Requests\DevicePositionRequest as UpdateRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DevicePositionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DevicePositionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\DevicePosition::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/deviceposition');
        CRUD::setEntityNameStrings('Posisi Perangkat', 'Posisi Perangkat');

        $this->crud->setCreateView('backpack::crud.device-position.create');
        $this->crud->setEditView('backpack::crud.device-position.edit');
        $this->crud->setListView('backpack::crud.device-position.list');

        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        $this->crud->show = 0;
        $this->crud->delete = 0;
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
        CRUD::removeButton('create');

        CRUD::addColumn([   
                'label' => 'Nama Perangkat',
                'name' => 'name',
            ]);
        CRUD::addColumn([    
                'label' => 'Latitude',
                'name' => 'latitude',
            ]);
        CRUD::addColumn([    
                'label' => 'Longitude',
                'name' => 'longitude',
            ]);
       
        CRUD::addColumn([
                'name' => 'status',
                'label' => 'Tipe Perangkat',
                'type' => 'closure',
                'function' => function($entry) {
                        return $entry->status;
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
        CRUD::setValidation(DevicePositionRequest::class);

        CRUD::addField([   
                'label' => 'Nama Perangkat',
                'name' => 'name',
            ]);
        CRUD::addField([    
                'label' => 'Latitude',
                'name' => 'latitude',
            ]);
        CRUD::addField([    
                'label' => 'Longitude',
                'name' => 'longitude',
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
        CRUD::setValidation(DevicePositionRequest::class);

        CRUD::addField([   
                'label' => 'Nama Perangkat',
                'name' => 'name',
            ]);
        CRUD::addField([    
                'label' => 'Latitude',
                'name' => 'latitude',
            ]);
        CRUD::addField([    
                'label' => 'Longitude',
                'name' => 'longitude',
            ]);
    }
}

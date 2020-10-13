<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReportStatusRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\ReportStatusRequest as StoreRequest;
use App\Http\Requests\ReportStatusRequest as UpdateRequest;

/**
 * Class ReportStatusCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReportStatusCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ReportStatus::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reportstatus');
        CRUD::setEntityNameStrings('Report Status', 'Report Status');

        $this->crud->show = 0;
        $this->crud->delete = 1;
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
        CRUD::addColumn([
                  'name' => 'name',
                  'label' => 'Jenis Status',
                  'type' => 'text',
              ]);
        CRUD::addColumn([
                  'name' => 'updated_at',
                  'label' => 'Last Update',
                  'type' => 'datetime',
              ]);

        CRUD::removeButton('delete');
        CRUD::removeButton('show');
        
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ReportStatusRequest::class);
        CRUD::field('name');
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

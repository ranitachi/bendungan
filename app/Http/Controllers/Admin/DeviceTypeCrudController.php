<?php

namespace App\Http\Controllers\Admin;

use DB;
use Session;
use App\Http\Requests\DeviceTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\DeviceTypeRequest as StoreRequest;
use App\Http\Requests\DeviceTypeRequest as UpdateRequest;
/**
 * Class DeviceTypeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DeviceTypeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\DeviceType::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/devicetype');
        CRUD::setEntityNameStrings('Device Type', 'Device Type');

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
                  'name' => 'type',
                  'label' => 'Device Type',
                  'type' => 'text',
              ]);
        CRUD::addColumn([
                  'name' => 'created_at',
                  'label' => 'Created At',
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
        CRUD::setValidation(DeviceTypeRequest::class);
        CRUD::field('type');
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

    public function store()
    {
        try{
            DB::beginTransaction();
            $response = $this->traitStore();
            DB::commit();
            return $response;
        }
        catch(Exception $ex)
        {
            DB::rollback();
            Session::flash('error','Insert Failed');
            return $request->http_referrer;
        }
    }

    public function update()
    {
        try{
            DB::beginTransaction();
            $response = $this->traitUpdate();
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
    // public function store(StoreRequest $request)
    // {
    //     $item = CRUD::create($request->toArray());
    //     \Alert::success(trans('backpack::crud.insert_success'))->flash();

    //     // save the redirect choice for next time
    //     CRUD::setSaveAction();

    //     return CRUD::performSaveAction($item->getKey());
    //     // return $response;
    // }
}

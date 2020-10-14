<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\ReportScheduleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ReportScheduleRequest as StoreRequest;
use App\Http\Requests\ReportScheduleRequest as UpdateRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReportScheduleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReportScheduleCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ReportSchedule::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reportschedule');
        CRUD::setEntityNameStrings('Jadwal Pendataan', 'Jadwal Pendataan');
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
        CRUD::removeButton('delete');
        CRUD::removeButton('show');
        // CRUD::enableDetailsRow();

        CRUD::addColumn([
            'label' => 'Nama Perangkat',
            'name' => 'nama_perangkat',
            'type' => 'closure',
            'function' => function($entry) {
                return $entry->nama_perangkat;
            }
        ]);
        CRUD::addColumn([
            'label' => 'Nama Petugas',
            'name' => 'nama_petugas',
            'type' => 'closure',
            'function' => function($entry) {
                return $entry->nama_petugas;
            }
        ]);
        CRUD::addColumn([
            'label' => 'Tanggal Pelaksanaan',
            'name' => 'scheduled_at',
            'type' => 'datetime'
        ]);
        CRUD::addColumn([
            'label' => 'Status',
            'name' => 'status_report',
            'type' => 'closure',
            'function' => function($entry) {
                return $entry->status_report;
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
        CRUD::setValidation(ReportScheduleRequest::class);

        CRUD::addField([
                'label' => 'Nama Perangkat',
                'type' => 'select2',
                'name' => 'device_id',
                'entity' => 'device',
                'placeholder' => true,
                'attributes' => ['step' => 'any'],
                'allows_null' => false,
            ]);

        
        CRUD::addField([
                'label' => 'Nama Petugas',
                'type' => 'select2',
                'name' => 'user_id',
                'attribute' => 'name',
                'model' => "App\Models\User",
                'placeholder' => true,
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->where('level', 4)->get();
                })
            ]);
        CRUD::addField([
                  'name' => 'scheduled_at',
                  'label' => 'Tanggal Rencana Pelaksanaan',
                  'type' => 'datetime',
                  'attributes' => ['class'=>'form-control col-md-3']
              ]);
        CRUD::addField([
                  'name' => 'reporting_status',
                  'type' => 'hidden',
                  'value' => 1
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
        CRUD::setValidation(ReportScheduleRequest::class);

        CRUD::addField([
                'label' => 'Nama Perangkat',
                'type' => 'select2',
                'name' => 'device_id',
                'entity' => 'device',
                'placeholder' => true,
                'attributes' => ['step' => 'any'],
                'allows_null' => false,
            ]);

        
        CRUD::addField([
                'label' => 'Nama Petugas',
                'type' => 'select2',
                'name' => 'user_id',
                'attribute' => 'name',
                'model' => "App\Models\User",
                'placeholder' => true,
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->where('level', 4)->get();
                })
            ]);
        CRUD::addField([
                  'name' => 'scheduled_at',
                  'label' => 'Tanggal Rencana Pelaksanaan',
                  'type' => 'datetime',
                  'attributes' => ['class'=>'form-control col-md-3']
              ]);
        CRUD::addField([
                'label' => 'Nama Petugas',
                'type' => 'select2',
                'name' => 'reporting_status',
                'attribute' => 'name',
                'model' => "App\Models\ReportStatus",
                'placeholder' => true
            ]);
    }
}

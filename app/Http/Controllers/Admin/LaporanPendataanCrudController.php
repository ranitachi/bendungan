<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\LaporanPendataan;
use App\Http\Requests\LaporanPendataanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Excel;
/**
 * Class LaporanPendataanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LaporanPendataanCrudController extends CrudController
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
        CRUD::setModel(\App\Models\LaporanPendataan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/laporanpendataan');
        CRUD::setEntityNameStrings('Laporan Pendataan', 'Laporan Pendataan');

        $this->crud->setListView('backpack::crud.laporan.index');
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

        CRUD::addField([
                'label' => 'Nama Perangkat',
                'type' => 'select2',
                'name' => 'device_id',
                'entity' => 'device',
                'placeholder' => true,
                'attributes' => ['class' => 'form-control select2'],
                'allows_null' => false,
            ]);
        CRUD::addField([   // date_range
                'name'  => ['start_date', 'end_date'], // db columns for start_date & end_date
                'label' => 'Tanggal Pendataan',
                'type'  => 'date_range',
                'date_range_options' => [
                    'timePicker' => true,
                    'locale' => ['format' => 'DD/MM/YYYY HH:mm']
                ]
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
        CRUD::setValidation(LaporanPendataanRequest::class);

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

    public function export_laporan(Request $request)
    {
        // return $request->all();
        $device_id = $request->device_id;
        $date1 = strtok($request->start_date,' ');
        $date2 = strtok($request->end_date,' ');
        $export = new LaporanPendataan($device_id,$date1,$date2);
        return Excel::download($export, 'laporanPendataan.xlsx');
    }
}

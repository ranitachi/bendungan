<?php

namespace App\Http\Controllers\Admin;

use DB;
use Session;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequest as StoreRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\UserUpdateRequest as UpdateRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('Pengguna', 'Pengguna');

        $this->crud->show = 1;
        $this->crud->delete = 1;
        $this->crud->enableIndexColumn();
    }

    protected function setupListOperation()
    {
        CRUD::addColumn([
                  'name' => 'level_user',
                  'label' => 'Level',
                  'type' => 'closure',
                    'function' => function($entry) {
                        return $entry->level_user;
                    }
              ]);
        CRUD::addColumn([
                  'name' => 'ktp',
                  'label' => 'KTP',
                  'type' => 'text',
              ]);
        CRUD::addColumn([
                  'name' => 'name',
                  'label' => 'Nama',
                  'type' => 'text',
              ]);
        CRUD::addColumn([
                  'name' => 'email',
                  'label' => 'Email',
                  'type' => 'text',
              ]);
        CRUD::addColumn([
                  'name' => 'kontak',
                  'label' => 'No.HP/No.Telp',
                  'type' => 'closure',
                    'function' => function($entry) {
                        return $entry->kontak;
                    }
              ]);
        CRUD::addColumn([
                  'name' => 'kelamin',
                  'label' => 'Gender',
                  'type' => 'closure',
                    'function' => function($entry) {
                        return $entry->kelamin;
                    }
              ]);
        CRUD::addColumn([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'closure',
            'function' => function($entry) {
                return $entry->status_user;
            }
        ]);

        CRUD::enableDetailsRow();
        CRUD::removeButton('delete');
        // CRUD::removeButton('show');
    }
    public function showDetailsRow($id)
    {
        $user = User::find($id);
        return view('backpack::crud.user.details_row', compact('user'));
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {   
        CRUD::setValidation(UserRequest::class);
        CRUD::addField([
                  'name' => 'ktp',
                  'label' => 'KTP',
                  'type' => 'text',
              ]);
        CRUD::addField([
                  'name' => 'name',
                  'label' => 'Nama',
                  'type' => 'text',
              ]);
        CRUD::addField([
                  'name' => 'email',
                  'label' => 'Email (Username)',
                  'type' => 'email',
              ]);
        CRUD::addField([
                  'name' => 'password',
                  'label' => 'Password',
                  'type' => 'text',
              ]);
        
        CRUD::addField([
                  'name' => 'no_handphone',
                  'label' => 'Nomor Handphone',
                  'type' => 'text',
              ]);
        
        CRUD::addField([
                  'name' => 'no_telepon',
                  'label' => 'Nomor Telepon',
                  'type' => 'text',
              ]);
        CRUD::addField([
                  'name' => 'alamat',
                  'label' => 'Alamat',
                  'type' => 'textarea',
              ]);
        
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'select2_from_array',
            'options' => ['L' => 'Laki-Laki', 'P' => 'Perempuan'],
            'allows_null' => true,
        ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array',
            'options' => ['1' => 'Aktif', '0' => 'Tidak Aktif'],
            'allows_null' => true,
        ]);
        CRUD::addField([
                'label' => 'Level Pengguna',
                'name' => 'level',
                'entity' => 'level_user',
                'type' => 'select2',
                'model' => "App\Models\Role",
            ]);
        CRUD::addField([
            'name' => 'foto',
            'label' => 'Foto/Avatar',
            'type' => 'upload',
            'upload' => true,
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
        $id = $this->crud->getCurrentEntryId();
        CRUD::setValidation(UpdateRequest::class);
        CRUD::field('ktp');
        CRUD::field('name');
        CRUD::field('email');
        CRUD::addField([
                  'name' => 'password',
                  'label' => 'Password (*biarkan Kosong Jika Tidak Di Ganti)',
                  'type' => 'text',
                  'value' => ''
              ]);
        
        CRUD::field('no_handphone');
        CRUD::field('no_telepon');
        CRUD::field('alamat');
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'select2_from_array',
            'options' => ['L' => 'Laki-Laki', 'P' => 'Perempuan'],
            'allows_null' => true,
        ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array',
            'options' => ['1' => 'Aktif', '0' => 'Tidak Aktif'],
            'allows_null' => true,
        ]);
        CRUD::addField([
                'label' => 'Level Pengguna',
                'name' => 'level',
                'entity' => 'level_user',
                'type' => 'select2',
                'model' => "App\Models\Role",
            ]);
        CRUD::addField([
            'name' => 'foto',
            'label' => 'Foto/Avatar',
            'type' => 'upload',
            'upload' => true,
        ]);
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
}

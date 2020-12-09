<?php

namespace App\Http\Controllers\Admin;

use DB;
use Excel;
use Illuminate\Http\Request;
use App\Models\PerangkatNilai;
use App\Imports\ImportNilaiPerangkat;
use App\Http\Requests\PerangkatNilaiRequest;
use App\Http\Requests\PerangkatNilaiRequest as StoreRequest;
use App\Http\Requests\PerangkatNilaiRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PerangkatNilaiCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PerangkatNilaiCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PerangkatNilai::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/perangkatnilai');
        CRUD::setEntityNameStrings('Grafik Perangkat', 'Grafik Perangkat');

        
        // $this->crud->setListView('backpack::crud.perangkat-nilai.index');
        
    }
    // protected function setupListOperation()
    public function index(Request $request)
    {
        // $this->crud->removeButton('create');
        $this->crud->removeButton('show');
        $this->crud->removeButton('delete');
        $this->crud->addButtonFromModelFunction('top', 'table_list', 'tableList', 'end');

        $this->crud->setValidation(PerangkatNilaiRequest::class);

        $perangkats = PerangkatNilai::select('nama_perangkat')->where('nama_perangkat','!=',"")->groupBy('nama_perangkat')->get();
        $perangkat = array();
        foreach($perangkats as $idx => $val)
        {
            $perangkat[$val->nama_perangkat]=$val->nama_perangkat;
        }
        
        $this->crud->addField([  // Select2
            'label'     => "Perangkat",
            'type'      => 'select2_from_array',
            'name'      => 'nama_perangkat', 
            'allows_null' => false,
            'placeholder' => '-Pilih-',
            'wrapper'   => [ 
                    'class'      => 'form-group col-md-6'
                ],
            'options'   => $perangkat
        ]);

        $this->crud->addField([   // date_range
                'name'  => ['start_date', 'end_date'], // db columns for start_date & end_date
                'label' => 'Pilih Tanggal',
                'type'  => 'date_range',
                'attributes' => ['id'=>'date_range'],
                'wrapper'   => [ 
                    'class'      => 'form-group col-md-6'
                ],
                'date_range_options' => [
                    'timePicker' => false,
                    'locale' => ['format' => 'DD/MM/YYYY']
                ]
            ]);
        return view('backpack::crud.perangkat-nilai.index')->with('crud',$this->crud);
    }

    public function list(Request $request)
    {
        $cari = $request->cari;
        if(isset($request->cari))
        {
            if($cari!='')
            {
                $data = PerangkatNilai::where('nama_perangkat','like',"%$cari%")
                                        ->orWhere('tanggal','like',"%$cari%")
                                        ->orWhere('nilai','like',"%$cari%")
                                        ->orderBy('tanggal','desc')->paginate(10);
            }
            else
                $data = PerangkatNilai::orderBy('tanggal','desc')->paginate(10);
        }
        else
        {
            $data = PerangkatNilai::orderBy('tanggal','desc')->paginate(10);
        }
        return view('backpack::crud.perangkat-nilai.list')
                    ->with('data',$data)
                    ->with('crud',$this->crud);
    }

    public function grafik(Request $request)
    {
        $this->crud->removeButton('create');
        $this->crud->removeButton('show');
        $this->crud->removeButton('delete');

        // return $request;
        $nama_perangkat = $request->nama_perangkat;
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        // $this->crud->nama_perangkat = $nama_perangkat;
        // return $end_date;
        $getdata = PerangkatNilai::where('nama_perangkat','like',"%$nama_perangkat%")->whereBetween('tanggal',[$start_date,$end_date])->orderBy('tanggal')->get();
        $data_x = $data_y = array();
        foreach($getdata as $idx=>$val)
        {
            $data_x[] = date('d-m-y',strtotime($val->tanggal));
            $data_y[] = $val->nilai;
        }
        // return $getdata;
        $this->crud->setValidation(PerangkatNilaiRequest::class);

        $perangkats = PerangkatNilai::select('nama_perangkat')->where('nama_perangkat','!=',"")->groupBy('nama_perangkat')->get();
        $perangkat = array();
        foreach($perangkats as $idx => $val)
        {
            $perangkat[$val->nama_perangkat]=$val->nama_perangkat;
        }

        $this->crud->addField([  // Select2
            'label'     => "Perangkat",
            'type'      => 'select2_from_array',
            'name'      => 'nama_perangkat', 
            'allows_null' => false,
            'placeholder' => '-Pilih-',
            'default' => $nama_perangkat,
            'wrapper'   => [ 
                    'class'      => 'form-group col-md-6'
                ],
            'options'   => $perangkat
        ]);

        $this->crud->addField([   // date_range
                'name'  => ['start_date', 'end_date'], // db columns for start_date & end_date
                'label' => 'Pilih Tanggal',
                'type'  => 'date_range',
                'attributes' => ['id'=>'date_range'],
                'wrapper'   => [ 
                    'class'      => 'form-group col-md-6'
                ],
                'default' => [$start_date.' 00:00',$end_date.' 00:00'],
                'date_range_options' => [
                    'timePicker' => false,
                    'locale' => ['format' => 'DD/MM/YYYY']
                ]
            ]);
        return view('backpack::crud.perangkat-nilai.grafik',compact('nama_perangkat','data_y','data_x','start_date','end_date'))->with('crud',$this->crud);
    }
    // public function index(Request $request){
    //     $this->crud->removeButton('create');
    //     // return $request;
    //     $this->crud->addField([   // date_range
    //             'name'  => ['start_date', 'end_date'],
    //             'label' => 'Pilih Tanggal',
    //             'type'  => 'date_range',
    //             'date_range_options' => [
    //                 'locale' => ['format' => 'DD/MM/YYYY']
    //             ]
    //         ]);
    //     return view('backpack::crud.perangkat-nilai.index')->with('crud',$this->crud);
    // }
    public function import() 
    {
        try{
            DB::beginTransaction();
            $file = public_path('files/elecpiz.xlsx');
            // Excel::import(new ImportNilaiPerangkat, $file);
            $array = Excel::toArray(new ImportNilaiPerangkat, $file);
            $perangkat = [];
            foreach($array[0] as $index => $val)
            {
                if($index==0)
                {
                    foreach($val as $k => $v)
                    {
                        if($k!=0)
                        {
                            if($v!='Remarks')
                            {
                                $perangkat[$k]=$v;
                            }
                        }
                    }
                }
                else
                {
                    $ket = $val[count($val)-1];
                    if($val[0]!='')
                    {
                        foreach($val as $k => $v)
                        {
                            if($k==0)
                            {

                                // if($v!='')
                                // {
                                //     $UNIX_DATE = ($v - 25569) * 86400;
                                //     $tgl = date('Y-m-d',strtotime($UNIX_DATE));
                                // }
                                // else
                                    $tgl = $v;
                                // $tgl = $UNIX_DATE;
                            }
                            else
                            {
                                // echo $v.'';
                                $newdata = new PerangkatNilai;
                                $newdata->nama_perangkat    = isset($perangkat[$k]) ? $perangkat[$k] : '';
                                $newdata->tanggal_excel     = $tgl;
                                $newdata->nilai             = $v;
                                $newdata->keterangan        = $ket;
                                $newdata->save();
                            }
                        }
                    }
                }
            }
            DB::commit();
        }
        catch(Exception $ex)
        {
            DB::rollback();
        }
        // return ($array[0][1]);
    }
    
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PerangkatNilaiRequest::class);

        $perangkats = PerangkatNilai::select('nama_perangkat')->where('nama_perangkat','!=',"")->groupBy('nama_perangkat')->get();
        $perangkat = array();
        foreach($perangkats as $idx => $val)
        {
            $perangkat[$val->nama_perangkat]=$val->nama_perangkat;
        }
        
        CRUD::addField([  // Select2
            'label'     => "Perangkat",
            'type'      => 'select2_from_array',
            'name'      => 'nama_perangkat', 
            'allows_null' => false,
            'placeholder' => '-Pilih-',
            'wrapper'   => [ 
                    'class'      => 'form-group col-md-7'
                ],
            'options'   => $perangkat
        ]);
        CRUD::addField([
            'type' => 'date',
            'name' => 'tanggal',
            'label' => 'Tanggal',
            'wrapper'   => [ 
                    'class'      => 'form-group col-md-7'
                ],
        ]);
        CRUD::addField([
            'type' => 'text',
            'name' => 'nilai',
            'label' => 'Nilai',
            'wrapper'   => [ 
                    'class'      => 'form-group col-md-7'
                ],
        ]);
        CRUD::addField([
            'type' => 'textarea',
            'name' => 'keterangan',
            'label' => 'Keterangan',
            'wrapper'   => [ 
                    'class'      => 'form-group col-md-7'
                ],
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
        $this->setupCreateOperation();
    }
}

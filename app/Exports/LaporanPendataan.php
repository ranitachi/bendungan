<?php
namespace App\Exports;

use App\Models\ReportSchedule;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class LaporanPendataan implements FromView
{
    protected $device_id;
    protected $date1;
    protected $date2;

    public function __construct(int $device_id,string $date1,string $date2)
    {
        $this->device_id = $device_id;
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function view(): View
    {
        // return view('backpack::crud.laporan.xls', [
        //     'invoices' => Invoice::all()
        // ]);
        $device_id = $this->device_id;
        $date1 = $this->date1;
        $date2 = $this->date2;
        $report = ReportSchedule::where('device_id',$device_id)->where(function($where) use ($date1,$date2){
            $where->where('start_at','>=',$date1);
            $where->where('done_at','<=',$date2);
        })
        ->with('device')
        ->with('petugas')
        ->get();
        return view('vendor.backpack.crud.laporan.xls', [
            'laporan' => $report
        ]);
    }
}
?>
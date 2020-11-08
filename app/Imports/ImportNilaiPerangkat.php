<?php
namespace App\Imports;
use App\Models\PerangkatNilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportNilaiPerangkat implements ToModel
{
    public function model(array $row)
    {
        $data=array();
        $index=0;
        foreach ($rows as $row) 
        {
            $data[$index]=$row;
            $index++;
        }

        return $data;
    }
}
?>
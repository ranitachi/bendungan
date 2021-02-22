<?php
namespace App\Helpers;

use App\Models\PerangkatNilai;

class FunctionHelper{

    public static function getnilaitmawaduk()
    {
        $get = PerangkatNilai::get();
        $data = array();
        foreach($get as $val)
        {
            $data[$val->tanggal] = $val->nilai_tma_waduk;
        }

        return $data;
    }

    public static function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT);
    }

    public static function random_color()
    {
        $st = self::random_color_part();
        $nd = self::random_color_part();
        $rd = self::random_color_part();
        return $st.$nd.$rd;
    }
}
?>
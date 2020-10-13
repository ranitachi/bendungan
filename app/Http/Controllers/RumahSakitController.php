<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function balaraja()
    {
        return view('pages.rumah-sakit.rsud-balaraja');
    }
}

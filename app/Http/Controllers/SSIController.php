<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SSIController extends Controller
{
    public function index()
    {
        return view('ssi');
    }

    public function create()
    {
        return view('pages.isidata.ssi');
    }
}

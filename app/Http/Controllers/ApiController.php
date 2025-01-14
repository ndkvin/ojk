<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Satker;
use App\Models\Wilker;
use App\Models\Type;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function bidang($function_id)
    {
        return Bidang::where('function_id', $function_id)->get();
    }

    public function satker($bidang_id)
    {
        return Satker::where('bidang_id', $bidang_id)->get();
    }

    public function wilker($satker_id)
    {
        return Wilker::where('satker_id', $satker_id)->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Satker;
use App\Models\Type;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function type($function_id)
    {
        return Type::where('function_id', $function_id)->get();
    }

    public function bidang($type_id)
    {
        return Bidang::where('type_id', $type_id)->get();
    }

    public function satker($bidang_id)
    {
        return Satker::where('bidang_id', $bidang_id)->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Fungsionalitas;
use App\Models\Fungsi;
use App\Models\Type;
use App\Models\Satker;
use App\Models\Bidang;
use Illuminate\Http\Request;

class FungsionalitasController extends Controller
{
    public function create()
    {
        $functions = Fungsi::all();
        $types = Type::all();
        $satkers = Satker::all();
        $bidangs = Bidang::all();

        return view('pages.fungsi', compact('functions', 'types', 'satkers', 'bidangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
        ]);

        // dd($validated['bidang_id']);        

        return redirect()->route('fungsionalitas.show', [
            'pilih',
            'function_id' => $validated['function_id'],
            'type_id' => $validated['type_id'],
            'satker_id' => $validated['satker_id'],
            'bidang_id' => $validated['bidang_id'],
        ]);
    }

    public function show()
    {
        // dd();
        return view('pages.select');
    }
}

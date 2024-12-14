<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SSI;

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

    public function store(Request $request)
    {
        $rules = [
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
            // 'jenis' => 'required|string|max:255',
        ];

        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $rules[$key . '.*'] = 'required';
            }
        }
        $validated = $request->validate($rules);


        // $jenis = $validated['jenis'];
        $rp = $validated['rp'];
        $pd = $validated['pd'];
        $os = $validated['os'];
        $af = $validated['af'];

        foreach ($rp as $key => $value) {
            SSI::create([
                'function_id' => $validated['function_id'],
                'type_id' => $validated['type_id'],
                'satker_id' => $validated['satker_id'],
                'bidang_id' => $validated['bidang_id'],
                'rp' => $rp[$key],
                'pd' => $pd[$key],
                'os' => $os[$key],
                'af' => $af[$key],
            ]);
        }
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}

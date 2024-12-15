<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.analisis');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
            'af_1_oq' => 'required|string',
            'af_2_oq' => 'required|string',
            'cf_1_oq' => 'required|string',
            'cf_2_oq' => 'required|string',
        ]);
    

        Analisis::create([
            'function_id' => $request->function_id,
            'type_id' => $request->type_id,
            'satker_id' => $request->satker_id,
            'bidang_id' => $request->bidang_id,
            'af_1_oq' => $request->af_1_oq,
            'af_2_oq' => $request->af_2_oq,
            'cf_1_oq' => $request->cf_1_oq,
            'cf_2_oq' => $request->cf_2_oq,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

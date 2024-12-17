<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $functionId = $request->get('function_id');
        $typeId = $request->get('type_id');
        $satkerId = $request->get('satker_id');
        $bidangId = $request->get('bidang_id');

        $analisis = Analisis::where('function_id', $functionId)
            ->where('type_id', $typeId)
            ->where('satker_id', $satkerId)
            ->where('bidang_id', $bidangId)
            ->first();
 
        return view('pages.analisis', [
            'analisis' => $analisis,
        ]);
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
            'kritik' => 'required|string',
            'saran' => 'required|string'
        ]);


        Analisis::create([
            'function_id' => $request->function_id,
            'type_id' => $request->type_id,
            'satker_id' => $request->satker_id,
            'bidang_id' => $request->bidang_id,
            'kritik' => $request->kritik,
            'saran' => $request->saran,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
            'kritik' => 'required|string',
            'saran' => 'required|string'
        ]);

        $analisis = Analisis::where('function_id', $request->function_id)
            ->where('type_id', $request->type_id)
            ->where('satker_id', $request->satker_id)
            ->where('bidang_id', $request->bidang_id)
            ->first();
        

        $analisis->update([
            'kritik' => $request->kritik,
            'saran' => $request->saran,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

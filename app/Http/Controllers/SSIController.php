<?php

namespace App\Http\Controllers;

use App\Models\SSI;
use Illuminate\Http\Request;

class SSICOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.ssi');
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
            'rp' => 'required|decimal:0,10',
            'pb' => 'required|decimal:0,10',
            'os' => 'required|decimal:0,10',
            'af' => 'required|decimal:0,10',
            'or' => 'required|decimal:0,10',
            'as' => 'required|decimal:0,10'
        ]);


        SSI::create([
            'function_id' => $request->function_id,
            'type_id' => $request->type_id,
            'satker_id' => $request->satker_id,
            'bidang_id' => $request->bidang_id,
            'rp' => $request->rp,
            'pb' => $request->pb,
            'os' => $request->os,
            'af' => $request->af,
            'or' => $request->or,
            'as' => $request->as
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

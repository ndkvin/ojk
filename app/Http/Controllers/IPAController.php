<?php

namespace App\Http\Controllers;

use App\Models\IPA;
use Illuminate\Http\Request;

class IPAController extends Controller
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
        return view('pages.isidata.ipa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
        ];

        // Dinamis menambahkan aturan validasi untuk keys lainnya
        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $rules[$key . '.*'] = 'required|string';
            }
        }
        $validated = $request->validate($rules);


        $dimensi = $validated['dimensi'];
        $score = $validated['score'];

        foreach ($dimensi as $key => $value) {
            IPA::create([
                'function_id' => $validated['function_id'],
                'type_id' => $validated['type_id'],
                'satker_id' => $validated['satker_id'],
                'bidang_id' => $validated['bidang_id'],
                'dimensi' => $dimensi[$key],
                'score' => $score[$key],
            ]);
        }
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

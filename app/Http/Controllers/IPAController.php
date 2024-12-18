<?php

namespace App\Http\Controllers;

use App\Models\IPA;
use App\Models\Kano;
use Illuminate\Http\Request;

class IPAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('pages.analisis');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $functionId = $request->get('function_id');
        $typeId = $request->get('type_id');
        $satkerId = $request->get('satker_id');
        $bidangId = $request->get('bidang_id');

        $attributes = Kano::where('function_id', $functionId)
            ->where('type_id', $typeId)
            ->where('satker_id', $satkerId)
            ->where('bidang_id', $bidangId)
            ->distinct('attribute')  // Getting unique values in the 'attribute' column
            ->pluck('attribute');

        return view('pages.isidata.ipa', [
            'attributes' => $attributes,
        ]);
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
        $attribute = $validated['attribute'];
        $dimensi = $validated['dimensi'];
        $score = $validated['score'];

        foreach ($dimensi as $key => $value) {

            // check ipa dengan dimensi sama apakah sudah ada 
            $existingData = IPA::where('function_id', $validated['function_id'])
                ->where('type_id', $validated['type_id'])
                ->where('satker_id', $validated['satker_id'])
                ->where('bidang_id', $validated['bidang_id'])
                ->where('attribute', $attribute[$key])
                ->where('dimensi', $dimensi[$key])
                ->first();

            if ($existingData) {
                $existingData->update([
                    'score' => $score[$key],
                ]);
            } else {
                IPA::create([
                    'function_id' => $validated['function_id'],
                    'type_id' => $validated['type_id'],
                    'satker_id' => $validated['satker_id'],
                    'bidang_id' => $validated['bidang_id'],
                    'attribute' => $attribute[$key],
                    'dimensi' => $dimensi[$key],
                    'score' => $score[$key],
                ]);
            }
        }
        return redirect()->route('fungsionalitas.show', [
            'pilih',
            'function_id' => $validated['function_id'],
            'type_id' => $validated['type_id'],
            'satker_id' => $validated['satker_id'],
            'bidang_id' => $validated['bidang_id'],
        ])->with('success', $existingData ? 'Data berhasil diperbarui.' : 'Data berhasil disimpan.');
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

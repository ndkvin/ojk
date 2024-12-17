<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Kano;
use Illuminate\Http\Request;

class KanoController extends Controller
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
        return view('pages.isidata.kano');
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

        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $rules[$key . '.*'] = 'required|string';
            }
        }

        $validated = $request->validate($rules);

        $attribute = $validated['attribute'];
        $puas = $validated['puas'];
        $penting = $validated['penting'];

        foreach ($attribute as $key => $value) {
            $existingData = Kano::where('function_id', $validated['function_id'])
                ->where('type_id', $validated['type_id'])
                ->where('satker_id', $validated['satker_id'])
                ->where('bidang_id', $validated['bidang_id'])
                ->where('attribute', $attribute[$key])
                ->first();

            if ($existingData) {
                $existingData->update([
                    'puas' => $puas[$key],
                    'penting' => $penting[$key],
                ]);
            } else {
                Kano::create([
                    'function_id' => $validated['function_id'],
                    'type_id' => $validated['type_id'],
                    'satker_id' => $validated['satker_id'],
                    'bidang_id' => $validated['bidang_id'],
                    'attribute' => $attribute[$key],
                    'puas' => $puas[$key],
                    'penting' => $penting[$key],
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
    public function show($function_id, $type_id, $satker_id, $bidang_id)
    {

        $data = Kano::where('function_id', $function_id)
            ->where('bidang_id', $bidang_id)
            ->where('satker_id', $satker_id)
            ->where('type_id', $type_id)
            ->get()
            ->map(function ($item) {
                return [
                    'x' => $item->puas,  // Misalnya kolom puas sebagai X-axis
                    'y' => $item->penting, // Misalnya kolom penting sebagai Y-axis
                    'label' => $item->attribute, // Label untuk setiap titik
                ];
            });

        // dd($data);

        // Passing data ke view
        return view('pages.kano.show', compact('data'));
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

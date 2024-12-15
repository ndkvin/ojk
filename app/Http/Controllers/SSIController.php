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
        $validated = $request->validate([
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
            'rp' => 'required|numeric',
            'pd' => 'required|numeric',
            'os' => 'required|numeric',
            'af' => 'required|numeric',
            'indirect_os' => 'required|numeric',
            'indirect_af' => 'required|numeric',
        ]);

        $ssi = SSI::create($validated);

        return redirect()->route('ssi.show', [
            'ssi' => $ssi->id, // ID data yang baru disimpan
        ])->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $ssi = SSI::findOrFail($id); // Ambil data berdasarkan ID

        return view('pages.ssi.show', compact('ssi')); // Kirim data ke view
    }
}

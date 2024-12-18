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

    public function create(Request $request)
    {
        $functionId = $request->query('function_id');
        $typeId = $request->query('type_id');
        $satkerId = $request->query('satker_id');
        $bidangId = $request->query('bidang_id');

        // Cek data lama berdasarkan kombinasi
        $existingData = SSI::where('function_id', $functionId)
            ->where('type_id', $typeId)
            ->where('satker_id', $satkerId)
            ->where('bidang_id', $bidangId)
            ->first();

        // Kirim data lama (jika ada) ke view
        return view('pages.isidata.ssi', compact('existingData', 'functionId', 'typeId', 'satkerId', 'bidangId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'function_id' => 'required|exists:functions,id',
            'type_id' => 'required|exists:types,id',
            'satker_id' => 'required|exists:satuan_kerja,id',
            'bidang_id' => 'required|exists:bidang,id',
            'rp' => 'nullable|numeric',
            'pd' => 'nullable|numeric',
            'os' => 'nullable|numeric',
            'af_1_oq' => 'nullable|numeric',
            'af_2_oq' => 'nullable|numeric',
            'cf_1_oq' => 'nullable|numeric',
            'cf_2_oq' => 'nullable|numeric',
            'indirect_os' => 'nullable|numeric',
            'indirect_af_1_oq' => 'nullable|numeric',
            'indirect_af_2_oq' => 'nullable|numeric',
            'indirect_cf_1_oq' => 'nullable|numeric',
            'indirect_cf_2_oq' => 'nullable|numeric',
        ]);

        $existingData = SSI::where('function_id', $validated['function_id'])
            ->where('type_id', $validated['type_id'])
            ->where('satker_id', $validated['satker_id'])
            ->where('bidang_id', $validated['bidang_id'])
            ->first();

        if ($existingData) {
            foreach ($validated as $key => $value) {
                if (is_null($value)) {
                    $validated[$key] = $existingData->$key;
                }
            }
            $existingData->update($validated);
            $ssi = $existingData;
        } else {
            $ssi = SSI::create($validated);
        }

        return redirect()->route('fungsionalitas.show', [
            'pilih',
            'function_id' => $validated['function_id'],
            'type_id' => $validated['type_id'],
            'satker_id' => $validated['satker_id'],
            'bidang_id' => $validated['bidang_id'],
        ])->with('success', $existingData ? 'Data berhasil diperbarui.' : 'Data berhasil disimpan.');
    }



    public function show(Request $request, $id)
    {
        // dd($request);
        $function_id =  $request->get('function_id');
        $type_id = $request->get('type_id');
        $satker_id = $request->get('satker_id');
        $bidang_id = $request->get('bidang_id');
        $jenis_af = $request->get('af');

        $ssi = null;

        if ($function_id && $type_id && $satker_id && $bidang_id) {
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
                ->where('type_id', $type_id)
                ->where('satker_id', $satker_id)
                ->where('bidang_id', $bidang_id)
                ->get();

            $ssi = [
                'rp' => $ssi->avg('rp'),
                'pd' => $ssi->avg('pd'),
                'os' => $ssi->avg('os'),
                'af_1_oq' => $ssi->avg('af_1_oq'),
                'af_2_oq' => $ssi->avg('af_2_oq'),
                'cf_1_oq' => $ssi->avg('cf_1_oq'),
                'indirect_os' => $ssi->avg('indirect_os'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
            ];

            
        } else if ($function_id && $type_id && $satker_id) {
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
                ->where('type_id', $type_id)
                ->where('satker_id', $satker_id)
                ->get();

            $ssi = [
                'rp' => $ssi->avg('rp'),
                'pd' => $ssi->avg('pd'),
                'os' => $ssi->avg('os'),
                'af_1_oq' => $ssi->avg('af_1_oq'),
                'af_2_oq' => $ssi->avg('af_2_oq'),
                'cf_1_oq' => $ssi->avg('cf_1_oq'),
                'indirect_os' => $ssi->avg('indirect_os'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
            ];

            
        } else if ($function_id && $type_id) {
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
                ->where('type_id', $type_id)
                ->get();

            $ssi = [
                'rp' => $ssi->avg('rp'),
                'pd' => $ssi->avg('pd'),
                'os' => $ssi->avg('os'),
                'af_1_oq' => $ssi->avg('af_1_oq'),
                'af_2_oq' => $ssi->avg('af_2_oq'),
                'cf_1_oq' => $ssi->avg('cf_1_oq'),
                'indirect_os' => $ssi->avg('indirect_os'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
            ];

            
        } else if ($function_id) {
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
                ->get();

            $ssi = [
                'rp' => $ssi->avg('rp'),
                'pd' => $ssi->avg('pd'),
                'os' => $ssi->avg('os'),
                'af_1_oq' => $ssi->avg('af_1_oq'),
                'af_2_oq' => $ssi->avg('af_2_oq'),
                'cf_1_oq' => $ssi->avg('cf_1_oq'),
                'indirect_os' => $ssi->avg('indirect_os'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
            ];
            
        }

        if ($jenis_af == 'af_1_oq') {
            $ssi['direct_af'] = $ssi['af_1_oq'];
            $ssi['indirect_af'] = $ssi['indirect_af_1_oq'];
        } else if ($jenis_af == 'af_2_oq') {
            $ssi['direct_af'] = $ssi['af_2_oq'];
            $ssi['indirect_af'] = $ssi['indirect_af_2_oq'];
        } else if ($jenis_af == 'cf_1_oq') {
            $ssi['direct_af'] = $ssi['cf_1_oq'];
            $ssi['indirect_af'] = $ssi['indirect_cf_1_oq'];
        } else {
            $ssi['direct_af'] = $ssi['cf_2_oq'];
            $ssi['indirect_af'] = $ssi['indirect_cf_2_oq'];
        }

        return view('pages.ssi.show', compact('ssi'));
    }
}

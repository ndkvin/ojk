<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\SSI;
use App\Models\Kano;
use App\Models\IPA;
use App\Models\User;
use Illuminate\Http\Request;

class DashoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ssi = SSI::when($request->get('function_id'), function ($query) use ($request) {
            $query->where('function_id', $request->get('function_id'));
        })
            ->when($request->get('type_id'), function ($query) use ($request) {
                $query->where('type_id', $request->get('type_id'));
            })
            ->when($request->get('bidang_id'), function ($query) use ($request) {
                $query->where('bidang_id', $request->get('bidang_id'));
            })
            ->when($request->satker_id, function ($query) use ($request) {
                $query->where('satker_id', $request->satker_id);
            })
            ->get();

        $kano = Kano::when($request->get('function_id'), function ($query) use ($request) {
            $query->where('function_id', $request->get('function_id'));
        })
            ->when($request->get('type_id'), function ($query) use ($request) {
                $query->where('type_id', $request->get('type_id'));
            })
            ->when($request->get('bidang_id'), function ($query) use ($request) {
                $query->where('bidang_id', $request->get('bidang_id'));
            })
            ->when($request->satker_id, function ($query) use ($request) {
                $query->where('satker_id', $request->satker_id);
            })
            ->get();

        $ipa = IPA::when($request->get('function_id'), function ($query) use ($request) {
            $query->where('function_id', $request->get('function_id'));
        })
            ->when($request->get('type_id'), function ($query) use ($request) {
                $query->where('type_id', $request->get('type_id'));
            })
            ->when($request->get('bidang_id'), function ($query) use ($request) {
                $query->where('bidang_id', $request->get('bidang_id'));
            })
            ->when($request->satker_id, function ($query) use ($request) {
                $query->where('satker_id', $request->satker_id);
            })
            ->get();

        $analisis = Analisis::when($request->get('function_id'), function ($query) use ($request) {
            $query->where('function_id', $request->get('function_id'));
        })
            ->when($request->get('type_id'), function ($query) use ($request) {
                $query->where('type_id', $request->get('type_id'));
            })
            ->when($request->get('bidang_id'), function ($query) use ($request) {
                $query->where('bidang_id', $request->get('bidang_id'));
            })
            ->when($request->satker_id, function ($query) use ($request) {
                $query->where('satker_id', $request->satker_id);
            })
            ->get();

        return view('pages.home', compact('ssi', 'kano', 'ipa', 'analisis'));
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
        //
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

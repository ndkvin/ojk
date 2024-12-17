<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Bidang;
use App\Models\Fungsi;
use App\Models\IPA;
use App\Models\Kano;
use App\Models\Satker;
use App\Models\SSI;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request);
        $function_id =  $request->get('function_id');
        $type_id = $request->get('type_id');
        $satker_id = $request->get('satker_id');
        $bidang_id = $request->get('bidang_id');
        $jenis_af = $request->get('jenis_af');

        $ssi = null;
        $kano = null;
        $ipa = null;
        $analisis = null;

        if ($function_id && $type_id && $satker_id && $bidang_id) {
            $ssi = SSI::where('function_id', $function_id)
                ->where('type_id', $type_id)
                ->where('satker_id', $satker_id)
                ->where('bidang_id', $bidang_id)
                ->first();

            $kano = Kano::where('function_id', $function_id)
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

            $ipa = IPA::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->where('satker_id', $satker_id)
                ->where('type_id', $type_id)
                ->get();

            $analisis = Analisis::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->where('satker_id', $satker_id)
                ->where('type_id', $type_id)
                ->first();
        }


        $functions = Fungsi::all();
        $types = Type::all();
        $satkers = Satker::all();
        $bidangs = Bidang::all();

        return view('pages.home', [
            'functions' => $functions,
            'types' => $types,
            'satkers' => $satkers,
            'bidangs' => $bidangs,
            'ssi' => $ssi,
            'kano' => $kano,
            'ipa' => $ipa,
            'analisis' => $analisis,
            'jenis_af' => $jenis_af
        ]);
    }
}

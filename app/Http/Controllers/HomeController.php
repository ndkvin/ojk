<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Bidang;
use App\Models\Fungsi;
use App\Models\IPA;
use App\Models\Kano;
use App\Models\Satker;
use App\Models\Wilker;
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
        // dd($request->all());
        $function_id =  $request->get('function_id');
        $bidang_id = $request->get('bidang_id');
        $satker_id = $request->get('satker_id');
        $wilker_id = $request->get('wilker_id');

        // dd($function_id, $type_id, $satker_id, $bidang_id);

        $ssi = null;
        $kano = null;
        $ipa = null;
        $analisis = null;

        $functions = Fungsi::all();
        $satkers = Satker::all();
        $bidangs = Bidang::all();
        $wilkers = Wilker::all();

        if ($function_id  && $bidang_id && $satker_id && $wilker_id) {
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
                ->where('satker_id', $satker_id)
                ->where('bidang_id', $bidang_id)
                ->where('wilker_id', $wilker_id)
                ->get();

            $ssi = [
                'rp' => $ssi->avg('rp'),
                'pd' => $ssi->avg('pd'),
                'os' => $ssi->avg('os'),
                'af_1_oq' => $ssi->avg('af_1_oq'),
                'af_2_oq' => $ssi->avg('af_2_oq'),
                'cf_1_oq' => $ssi->avg('cf_1_oq'),
                'cf_2_oq' => $ssi->avg('cf_2_oq'),
                'indirect_os_subject' => $ssi->avg('indirect_os_subject'),
                'indirect_os_context' => $ssi->avg('indirect_os_context'),
                'indirect_os_low_power' => $ssi->avg('indirect_os_low_power'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
                'indirect_cf_2_oq' => $ssi->avg('indirect_cf_2_oq'),
            ];

            $kano = Kano::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->where('satker_id', $satker_id)
                ->where('wilker_id', $wilker_id)
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
                // ->where('wilker_id', $wilker_id)
                ->get();

            $analisis = Analisis::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->where('satker_id', $satker_id)
                // ->where('wilker_id', $wilker_id)
                ->get();

            $functions = Fungsi::all();
            $bidangs = Bidang::where('function_id', $function_id)->get();
            $satkers = Satker::where('bidang_id', $bidang_id)->get();
        } else if ($function_id  && $bidang_id && $satker_id) {
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
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
                'cf_2_oq' => $ssi->avg('cf_2_oq'),
                'indirect_os_subject' => $ssi->avg('indirect_os_subject'),
                'indirect_os_context' => $ssi->avg('indirect_os_context'),
                'indirect_os_low_power' => $ssi->avg('indirect_os_low_power'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
                'indirect_cf_2_oq' => $ssi->avg('indirect_cf_2_oq'),
            ];

            $kano = Kano::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->where('satker_id', $satker_id)
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
                ->get();

            $analisis = Analisis::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->where('satker_id', $satker_id)
                ->get();

            $functions = Fungsi::all();
            $bidangs = Bidang::where('function_id', $function_id)->get();
            $satkers = Satker::where('bidang_id', $bidang_id)->get();
        } else if ($function_id && $bidang_id) {
            // dd('here');
            if (!$request->get('af')) {
                return redirect()->back()->withErrors(['af' => 'Pilih AF terlebih dahulu']);
            }
            $ssi = SSI::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->get();

            $ssi = [
                'rp' => $ssi->avg('rp'),
                'pd' => $ssi->avg('pd'),
                'os' => $ssi->avg('os'),
                'af_1_oq' => $ssi->avg('af_1_oq'),
                'af_2_oq' => $ssi->avg('af_2_oq'),
                'cf_1_oq' => $ssi->avg('cf_1_oq'),
                'cf_2_oq' => $ssi->avg('cf_2_oq'),
                'indirect_os_subject' => $ssi->avg('indirect_os_subject'),
                'indirect_os_context' => $ssi->avg('indirect_os_context'),
                'indirect_os_low_power' => $ssi->avg('indirect_os_low_power'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
                'indirect_cf_2_oq' => $ssi->avg('indirect_cf_2_oq'),
            ];

            $kano = Kano::where('function_id', $function_id)
                ->where('bidang_id', $bidang_id)
                ->get()
                ->map(function ($item) {
                    return [
                        'x' => $item->puas,  // Misalnya kolom puas sebagai X-axis
                        'y' => $item->penting, // Misalnya kolom penting sebagai Y-axis
                        'label' => $item->attribute, // Label untuk setiap titik
                    ];
                });

            $ipa = IPA::where('function_id', $function_id)
                ->where('satker_id', $satker_id)
                ->get();

            $analisis = Analisis::where('function_id', $function_id)
                ->where('satker_id', $satker_id)
                ->get();

            $functions = Fungsi::all();
            $bidangs = Bidang::where('function_id', $function_id)->get();

            $functions = Fungsi::all();
            $bidangs = Bidang::where('function_id', $function_id)->get();
            $satkers = Satker::where('bidang_id', $bidang_id)->get();
        } else if ($function_id) {
            // dd('here');
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
                'cf_2_oq' => $ssi->avg('cf_2_oq'),
                'indirect_os_subject' => $ssi->avg('indirect_os_subject'),
                'indirect_os_context' => $ssi->avg('indirect_os_context'),
                'indirect_os_low_power' => $ssi->avg('indirect_os_low_power'),
                'indirect_af_1_oq' => $ssi->avg('indirect_af_1_oq'),
                'indirect_af_2_oq' => $ssi->avg('indirect_af_2_oq'),
                'indirect_cf_1_oq' => $ssi->avg('indirect_cf_1_oq'),
                'indirect_cf_2_oq' => $ssi->avg('indirect_cf_2_oq'),
            ];

            $kano = Kano::where('function_id', $function_id)
                ->get()
                ->map(function ($item) {
                    return [
                        'x' => $item->puas,  // Misalnya kolom puas sebagai X-axis
                        'y' => $item->penting, // Misalnya kolom penting sebagai Y-axis
                        'label' => $item->attribute, // Label untuk setiap titik
                    ];
                });

            $ipa = IPA::where('function_id', $function_id)
                ->get();

            $analisis = Analisis::where('function_id', $function_id)
                ->get();

            $functions = Fungsi::all();
            $bidangs = Bidang::where('function_id', $function_id)->get();
        }
        // dd($bidangs);
        return view('pages.home', [
            'functions' => $functions,
            'satkers' => $satkers,
            'bidangs' => $bidangs,
            'wilkers' => $wilkers,
            'ssi' => $ssi,
            'kano' => $kano,
            'ipa' => $ipa,
            'analisis' => $analisis
        ]);
    }
}

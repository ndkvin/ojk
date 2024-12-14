@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pilih Data</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Pilih Data</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3>Pilih Data</h3>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a
                    href="{{ route('ssi.create', [
                        'function_id' => request()->query('function_id'),
                        'type_id' => request()->query('type_id'),
                        'satker_id' => request()->query('satker_id'),
                        'bidang_id' => request()->query('bidang_id'),
                    ]) }}">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">SSI</h4>
                                <div class="card-text">
                                    Data SSI
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- <h1>{{ $request->query('function_id') }}</h1> --}}
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">KANO</h4>
                                <div class="card-text">
                                    Data KANO
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">IKA</h4>
                                <div class="card-text">
                                    Data IPA
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a
                    href="{{ route('analisis.index', [
                        'function_id' => request()->query('function_id'),
                        'type_id' => request()->query('type_id'),
                        'satker_id' => request()->query('satker_id'),
                        'bidang_id' => request()->query('bidang_id'),
                    ]) }}">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Analisis</h4>
                                <div class="card-text">
                                    Data Analisis
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h3>Pilih Data</h3>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="">
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
                                    Data IKA
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="{{ route('analisis.index') }}">
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

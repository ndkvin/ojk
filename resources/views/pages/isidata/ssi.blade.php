@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data SSI</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">SSI</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('ssi.store') }}" method="POST">
                                @csrf
                                <div class="col-12 col-md-6 order-md-1">
                                    <h3>Direct</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="rp">RP</label>
                                            <input class="form-control" type="number" name="rp" step="0.01" min="0" max="10" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="pd">Peformance Delivery</label>
                                            <input class="form-control" type="number" name="pd" step="0.01" min="0" max="10" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="os">Outcome Satisfaction</label>
                                            <input class="form-control" type="number" name="os" step="0.01" min="0" max="10" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="af">Adjusment Factor</label>
                                            <input class="form-control" type="number" name="af" step="0.01" min="0" max="10" required></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 order-md-1">
                                    <h3>Indirect</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="os">Outcome Satisfaction</label>
                                            <input class="form-control" type="number" name="indirect_os" step="0.01" min="0" max="10" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="af">Adjusment Factor</label>
                                            <input class="form-control" type="number" name="indirect_af" step="0.01" min="0" max="10" required></input>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name='function_id' value="{{ request()->query('function_id') }}">
                                <input type="hidden" name='type_id' value="{{ request()->query('type_id') }}">
                                <input type="hidden" name='satker_id' value="{{ request()->query('satker_id') }}">
                                <input type="hidden" name='bidang_id' value="{{ request()->query('bidang_id') }}">
                                <button type="submit" class="btn btn-primary me-1 mb-1" id="submit">Submit</button>
                            </form>
                            {{-- <div class="col-12 d-flex justify-content-between">
                                <button type="submit" onclick="submit()" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


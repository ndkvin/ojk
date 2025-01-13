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
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="rp">Resource Perception</label>
                                            <input class="form-control" value="{{ $existingData->rp ?? old('rp') }}" type="number" name="rp" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="pd">Peformance Delivery</label>
                                            <input class="form-control" value="{{ $existingData->pd ?? old('pd') }}" type="number" name="pd" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="os">Outcome Satisfaction</label>
                                            <input class="form-control" value="{{ $existingData->os ?? old('os') }}" type="number" name="os" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                </div>            
                                @if (Auth::user()->role == 'superadmin')                                        
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="af_1_oq">Adjusment Factor 1 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->af_1_oq ?? old('af_1_oq') }}" type="number" name="af_1_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="af_2_oq">Adjusment Factor 2 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->af_2_oq ?? old('af_2_oq') }}" type="number" name="af_2_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="cf_1_oq">Confirmation Factor 1 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->cf_1_oq ?? old('cf_1_oq') }}" type="number" name="cf_1_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="cf_2_oq">Confirmation Factor 2 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->cf_2_oq ?? old('cf_2_oq') }}" type="number" name="cf_2_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12 col-md-6 order-md-1">
                                    <h3>Indirect</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="indirect_os_subject">Outcome Satisfaction Subject</label>
                                            <input class="form-control" value="{{ $existingData->indirect_os_subject ?? old('indirect_os_subject') }}" type="number" name="indirect_os_subject" step="0.01" min="1" max="6"</input>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="indirect_os_context">Outcome Satisfaction Context Setter</label>
                                            <input class="form-control" value="{{ $existingData->indirect_os_context ?? old('indirect_os_context') }}" type="number" name="indirect_os_context" step="0.01" min="1" max="6"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="indirect_os_low_power">Outcome Satisfaction Crowds</label>
                                            <input class="form-control" value="{{ $existingData->indirect_os_low_power ?? old('indirect_os_low_power') }}" type="number" name="indirect_os_low_power" step="0.01" min="1" max="6"></input>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->role == 'superadmin')                                        
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="indirect_af_1_oq">Adjusment Factor 1 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->indirect_af_1_oq ?? old('indirect_af_1_oq') }}" type="number" name="indirect_af_1_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="indirect_af_2_oq">Adjusment Factor 2 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->indirect_af_2_oq ?? old('indirect_af_2_oq') }}" type="number" name="indirect_af_2_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="indirect_cf_1_oq">Confirmation Factor 1 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->indirect_cf_1_oq ?? old('indirect_cf_1_oq') }}" type="number" name="indirect_cf_1_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="indirect_cf_2_oq">Confirmation Factor 2 Open Question</label>
                                            <input class="form-control" value="{{ $existingData->indirect_cf_2_oq ?? old('indirect_cf_2_oq') }}" type="number" name="indirect_cf_2_oq" step="0.01" min="1" max="6" required></input>
                                        </div>
                                    </div>
                                </div>
                                @endif    
                                <input type="hidden" name='function_id' value="{{ request()->query('function_id') }}">
                                <!-- <input type="hidden" name='type_id' value="{{ request()->query('type_id') }}"> -->
                                <input type="hidden" name='satker_id' value="{{ request()->query('satker_id') }}">
                                <input type="hidden" name='bidang_id' value="{{ request()->query('bidang_id') }}">
                                <button type="submit" class="btn btn-danger me-1 mb-1" id="submit">Submit</button>
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


@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h1>Detail SSI</h1>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Analisis</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Direct Score</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h1>{{ $ssi->pd * 0.3 + $ssi->rp * 0.3 + $ssi->os * 0.3 + $ssi->af * 0.1 }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Indirect Score</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h1>{{ $ssi->indirect_os * 0.5 + $ssi->indirect_af * 0.5}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if(session('success'))
                                <div>{{ session('success') }}</div>
                            @endif
                            <div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Direct</h4>
                                    <div>
                                        <h5>RP : {{ $ssi->rp }}</h5>
                                    </div>
                                    <div>
                                        <h5>Peformance Delivery : {{ $ssi->pd }}</h5>
                                    </div>
                                    <div>
                                        <h5>Outcome Satisfaction : {{ $ssi->os }}</h5>
                                    </div>
                                    <div>
                                        <h5>Adjusment Factor : {{ $ssi->af }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Indirect</h4>
                                    <div>
                                        <h5>Outcome Satisfaction : {{ $ssi->indirect_os }}</h5>
                                    </div>
                                    <div>
                                        <h5>Adjusment Factor : {{ $ssi->indirect_af }}</h5>
                                    </div>
                                </div>
                            </div>
                            <table>
                                <tr>
                                    <th>Function ID:</th>
                                    <td>{{ $ssi->function_id }}</td>
                                </tr>
                                <tr>
                                    <th>Type ID:</th>
                                    <td>{{ $ssi->type_id }}</td>
                                </tr>
                                <tr>
                                    <th>Satker ID:</th>
                                    <td>{{ $ssi->satker_id }}</td>
                                </tr>
                                <tr>
                                    <th>Bidang ID:</th>
                                    <td>{{ $ssi->bidang_id }}</td>
                                </tr>
                                <tr>
                                    <th>RP:</th>
                                    <td>{{ $ssi->rp }}</td>
                                </tr>
                                <tr>
                                    <th>PD:</th>
                                    <td>{{ $ssi->pd }}</td>
                                </tr>
                                <tr>
                                    <th>OS:</th>
                                    <td>{{ $ssi->os }}</td>
                                </tr>
                                <tr>
                                    <th>AF:</th>
                                    <td>{{ $ssi->af }}</td>
                                </tr>
                                <tr>
                                    <th>Indirect OS:</th>
                                    <td>{{ $ssi->indirect_os }}</td>
                                </tr>
                                <tr>
                                    <th>Indirect AF:</th>
                                    <td>{{ $ssi->indirect_af }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

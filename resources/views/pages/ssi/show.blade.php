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
                            <h1>{{ $ssi['pd'] * 0.3 + $ssi['rp'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1 }}</h1>
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
                            <h1>
                                @if ($ssi == null)
                                    {{ 'Tidak Ada Data' }}
                                @elseif ($ssi['indirect_os_subject'] == null && $ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                    {{ 0 + $ssi['indirect_af'] * 0.1 }}
                                @elseif ($ssi['indirect_os_low_power'] == null && $ssi['indirect_os_subject'] == null)
                                    {{ ($ssi['indirect_os_context']) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_subject'] == null)
                                    {{ ($ssi['indirect_os_low_power']) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                    {{ ($ssi['indirect_os_subject']) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @elseif ($ssi['indirect_os_subject'] == null)
                                    {{ (($ssi['indirect_os_context'] + $ssi['indirect_os_low_power']) / 2) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @elseif ($ssi['indirect_os_context'] == null)
                                    {{ (($ssi['indirect_os_subject'] + $ssi['indirect_os_low_power']) / 2) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @elseif ($ssi['indirect_os_low_power'] == null)
                                    {{ (($ssi['indirect_os_subject'] + $ssi['indirect_os_context']) / 2) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @else
                                    {{ (($ssi['indirect_os_context'] + $ssi['indirect_os_low_power'] + $ssi['indirect_os_subject']) / 3) * 0.9 + $ssi['indirect_af'] * 0.1 }}
                                @endif 
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">SSI Score</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h1>
                                @if ($ssi == null)
                                    {{ 'Tidak Ada Data' }}
                                @elseif ($ssi['indirect_os_subject'] == null && $ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8, 2) }}
                                @elseif ($ssi['indirect_os_subject'] == null && $ssi['indirect_os_low_power'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_context'] * 0.2, 2) }}
                                @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_subject'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_low_power'] * 0.2, 2) }}
                                @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.2, 2) }}
                                @elseif ($ssi['indirect_os_subject'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_context'] * 0.1 + $ssi['indirect_os_low_power'] * 0.1, 2) }}
                                @elseif ($ssi['indirect_os_context'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.1 + $ssi['indirect_os_low_power'] * 0.1, 2) }}
                                @elseif ($ssi['indirect_os_low_power'] == null)
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.1 + $ssi['indirect_os_context'] * 0.1, 2) }}
                                @else
                                    {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $ssi['direct_af'] * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.1 + $ssi['indirect_os_context'] * 0.075 + $ssi['indirect_os_low_power'] * 0.025, 2) }}
                                @endif 
                            </h1>
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
                                <div class="col-md-6 col-12">
                                    <h4>Direct</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Resource Perception</th>
                                            <td>{{ $ssi['rp'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Performance Delivery</th>
                                            <td>{{ $ssi['pd'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Outcome Satisfaction</th>
                                            <td>{{ $ssi['os'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Adjustment Factor</th>
                                            <td>{{ $ssi['direct_af'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- Indirect Section -->
                                <div class="col-md-6">
                                    <h4>Indirect</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Outcome Satisfaction Subject</th>
                                            <td>{{ $ssi['indirect_os_subject'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Outcome Satisfaction Context</th>
                                            <td>{{ $ssi['indirect_os_context'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Outcome Satisfaction Crowds</th>
                                            <td>{{ $ssi['indirect_os_low_power'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Adjustment Factor</th>
                                            <td>{{ $ssi['indirect_af'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

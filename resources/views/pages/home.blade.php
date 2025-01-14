@extends('layouts.dashboard')

@section('head')

    <style>
        /* Custom Styling for the Card */
        .custom-card {
            background-color: #ffffff;
            /* Warna latar belakang (contoh: pink lembut) */
            border: 1px solid #ffffff;
            /* Border warna pink */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow untuk efek 3D */
            border-radius: 10px;
            /* Membuat sudut agak melengkung */
        }

        .custom-card .card-title {
            color: #721c24;
            /* Warna judul yang kontras */
        }

        .custom-card .card-text {
            color: #495057;
            /* Warna teks konten */
        }
    </style>
    <style>
        .header {
            background-color: rgb(255, 255, 255);
            /* Set the background color to red */
            max-height: 200px;
            /* Set the maximum height to 200px */
            color: white;
            /* Set text color to white for contrast */
            display: flex;
            /* Use flexbox for alignment */
            align-items: center;
            /* Center items vertically */
            padding: 10px;
            /* Add some padding */
            font-family: 'Roboto', sans-serif;
            /* Change font to Roboto */
            justify-content: center;
            /* Center the image */
            border-radius: 10px;
        }

        .header img {
            max-height: 150px;
            /* Set a maximum height for the image */
            margin-right: 15px;
            /* Add some space between the image and text */
        }

        .header h1 {
            margin: 0;
            /* Remove default margin from h1 */
            /* Allow h1 to take up remaining space */
        }
    </style>
@endsection

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12 mb-3" style="max-height: 400px">
            <header class="header">
                <img src="{{ asset('assets\img\OJK_Logo.png') }}" class="mb-3 mt-3" style="max-width: 150px" alt="Logo" />
                <!-- Replace with your image URL -->
                <h4 class="d-none d-md-block mb-3 mt-4" style="color: rgb(142, 141, 141)">SURVEY TINGKAT KEPUASAN STAKEHOLDERS
                    OJK</h4>
            </header>
        </div>
    </div>
    <div class="page-heading">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="GET">
                                    <div class="row" id="form-rows">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="function_id" class="form-label">Fungsi</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn" id="functionDropdownBtn"
                                                            onclick="toggleDropdown('functionDropdown')">
                                                            {{ request()->get('function_id') ? $functions->where('id', request()->get('function_id'))->first()->function : 'Fungsi' }}
                                                        </button>
                                                        <div class="dropdown-content" id="functionDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list">
                                                                @foreach ($functions as $function)
                                                                    <li data-value="{{ $function->id }}"
                                                                        onclick="selectFunction(this)">
                                                                        {{ $function->function }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden"
                                                        value="{{ request()->get('function_id') ? $functions->where('id', request()->get('function_id'))->first()->id : '' }}"
                                                        id="function_id" name="function_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bidang_id" class="form-label">Bidang</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn" id="bidangDropdownBtn"
                                                            onclick="toggleDropdown('bidangDropdown')"
                                                            {{ request()->get('function_id') ? '' : 'disabled' }}>
                                                            {{ request()->get('bidang_id') ? $bidangs->where('id', request()->get('bidang_id'))->first()->bidang : 'Bidang' }}
                                                        </button>
                                                        <div class="dropdown-content" id="bidangDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list" id="bidangDropdownList">
                                                                @foreach ($bidangs as $bidang)
                                                                    <li data-value="{{ $bidang->id }}"
                                                                        onclick="selectBidang(this)">
                                                                        {{ $bidang->bidang }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden"
                                                    value="{{ request()->get('bidang_id') ? $bidangs->where('id', request()->get('bidang_id'))->first()->id : '' }}"
                                                    id="bidang_id" name="bidang_id" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="satker_id" class="form-label">Satuan Kerja</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn" id="satkerDropdownBtn"
                                                            onclick="toggleDropdown('satkerDropdown')"
                                                            {{ request()->get('function_id') ? '' : 'disabled' }}>
                                                            {{ request()->get('satker_id') ? $satkers->where('id', request()->get('satker_id'))->first()->satker : 'Satuan kerja' }}
                                                        </button>
                                                        <div class="dropdown-content" id="satkerDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list" id="satkerDropdownList">
                                                                @foreach ($satkers as $satker)
                                                                    <li data-value="{{ $satker->id }}"
                                                                        onclick="selectSatker(this)">
                                                                        {{ $satker->satker }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden"
                                                    value="{{ request()->get('satker_id') ? $satkers->where('id', request()->get('satker_id'))->first()->id : '' }}"
                                                    id="satker_id" name="satker_id" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="wilker_id" class="form-label">KOJK Wilayah Kerja</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn" id="wilkerDropdownBtn"
                                                            onclick="toggleDropdown('wilkerDropdown')"
                                                            {{ request()->get('satker_id') ? '' : 'disabled' }}>
                                                            {{ request()->get('wilker_id') ? $wilkers->where('id', request()->get('wilker_id'))->first()->wilker : 'Wilayah Kerja' }}
                                                        </button>
                                                        <div class="dropdown-content" id="wilkerDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list" id="wilkerDropdownList">
                                                                @foreach ($wilkers as $wilker)
                                                                    <li data-value="{{ $wilker->id }}"
                                                                        onclick="selectDropdownItem(this, 'wilker_id')">
                                                                        {{ $wilker->wilker }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden"
                                                        value="{{ request()->get('wilker_id') ? $wilkers->where('id', request()->get('wilker_id'))->first()->id : '' }}"
                                                        id="wilker_id" name="wilker_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="afdd" class="form-label">AF</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn" id="afDropdownBtn"
                                                            onclick="toggleDropdown('afdd')">
                                                            @if (request()->get('af') == 'af_1_oq')
                                                                Adjusment Factor 1 Open Question
                                                            @elseif(request()->get('af') == 'af_2_oq')
                                                                Adjusment Factor 2 Open Question
                                                            @elseif(request()->get('af') == 'cf_1_oq')
                                                                Confirmation Factor 1 Open Question
                                                            @elseif(request()->get('af') == 'cf_2_oq')
                                                                Confirmation Factor 2 Open Question
                                                            @else
                                                                AF
                                                            @endif
                                                        </button>
                                                        <div class="dropdown-content" id="afdd">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list">
                                                                <li data-value="af_1_oq"
                                                                    onclick="selectDropdownItem(this, 'af')">
                                                                    Adjusment Factor 1 Open Question
                                                                </li>
                                                                <li data-value="af_2_oq"
                                                                    onclick="selectDropdownItem(this, 'af')">
                                                                    Adjusment Factor 2 Open Question
                                                                </li>
                                                                <li data-value="cf_1_oq"
                                                                    onclick="selectDropdownItem(this, 'af')">
                                                                    Confirmation Factor 1 Open Question
                                                                </li>
                                                                <li data-value="cf_2_oq"
                                                                    onclick="selectDropdownItem(this, 'af')">
                                                                    Confirmation Factor 2 Open Question
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden"
                                                        value="{{ request()->get('af') ? request()->get('af') : '' }}"
                                                        id="af" name="af" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="w-100 btn btn-secondary" style="margin-top:10px"
                                                onclick="clearFilter()">Clear</div>
                                            <button type="submit" class="w-100 btn btn-danger"
                                                style="margin-top:10px">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h2>
                            SSI
                        </h2>
                    </div>
                </div>
                <div class="card-content">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="container">
                                    <div class="card custom-card mx-auto" style="max-width: 500px">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <center>
                                                    <h4 class="card-title">Direct</h4>
                                                </center>
                                                <center>
                                                    @php
                                                        if ($ssi) {
                                                            $direct_af = 0;
                                                            $indirect_af = 0;

                                                            if (request()->query('af') == 'af_1_oq') {
                                                                $direct_af = $ssi['af_1_oq'];
                                                                $indirect_af = $ssi['indirect_af_1_oq'];
                                                            } elseif (request()->query('af') == 'af_2_oq') {
                                                                $direct_af = $ssi['af_2_oq'];
                                                                $indirect_af = $ssi['indirect_af_2_oq'];
                                                            } elseif (request()->query('af') == 'cf_1_oq') {
                                                                $direct_af = $ssi['cf_1_oq'];
                                                                $indirect_af = $ssi['indirect_cf_1_oq'];
                                                            } elseif (request()->query('af') == 'cf_2_oq') {
                                                                $direct_af = $ssi['cf_2_oq'];
                                                                $indirect_af = $ssi['indirect_cf_2_oq'];
                                                            }
                                                        }
                                                    @endphp
                                                    <h5 class="card-text">
                                                        {{ $ssi == null ? 'Tidak Ada Data' : $ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1 }}
                                                    </h5>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="container">

                                    <div class="card custom-card mx-auto" style="max-width: 500px">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <center>
                                                    <h4 class="card-title">Indirect</h4>
                                                </center>
                                                <center>
                                                    <h5 class="card-text">
                                                        @if ($ssi == null)
                                                            {{ 'Tidak Ada Data' }}
                                                        @elseif ($ssi['indirect_os_subject'] == null && $ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                                            {{ 0 + $indirect_af * 0.1 }}
                                                        @elseif ($ssi['indirect_os_low_power'] == null && $ssi['indirect_os_subject'] == null)
                                                            {{ $ssi['indirect_os_context'] * 0.9 + $indirect_af * 0.1 }}
                                                        @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_subject'] == null)
                                                            {{ $ssi['indirect_os_low_power'] * 0.9 + $indirect_af * 0.1 }}
                                                        @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                                            {{ $ssi['indirect_os_subject'] * 0.9 + $indirect_af * 0.1 }}
                                                        @elseif ($ssi['indirect_os_subject'] == null)
                                                            {{ (($ssi['indirect_os_context'] + $ssi['indirect_os_low_power']) / 2) * 0.9 + $indirect_af * 0.1 }}
                                                        @elseif ($ssi['indirect_os_context'] == null)
                                                            {{ (($ssi['indirect_os_subject'] + $ssi['indirect_os_low_power']) / 2) * 0.9 + $indirect_af * 0.1 }}
                                                        @elseif ($ssi['indirect_os_low_power'] == null)
                                                            {{ (($ssi['indirect_os_subject'] + $ssi['indirect_os_context']) / 2) * 0.9 + $indirect_af * 0.1 }}
                                                        @else
                                                            {{ (($ssi['indirect_os_context'] + $ssi['indirect_os_low_power'] + $ssi['indirect_os_subject']) / 3) * 0.9 + $indirect_af * 0.1 }}
                                                        @endif

                                                        {{-- {{ $ssi['indirect_os_subject'] }} --}}
                                                    </h5>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mx-auto col-md-8 col-12">
                                <div class="card custom-card mx-auto" style="max-width: 500px">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <center>
                                                <h4 class="card-title">Total</h4>
                                            </center>
                                            <center>
                                                <h5 class="card-text">
                                                    @if ($ssi == null)
                                                        {{ 'Tidak Ada Data' }}
                                                    @elseif ($ssi['indirect_os_subject'] == null && $ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8, 2) }}
                                                    @elseif ($ssi['indirect_os_subject'] == null && $ssi['indirect_os_low_power'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_context'] * 0.2, 2) }}
                                                    @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_subject'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_low_power'] * 0.2, 2) }}
                                                    @elseif ($ssi['indirect_os_context'] == null && $ssi['indirect_os_low_power'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.2, 2) }}
                                                    @elseif ($ssi['indirect_os_subject'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_context'] * 0.1 + $ssi['indirect_os_low_power'] * 0.1, 2) }}
                                                    @elseif ($ssi['indirect_os_context'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.1 + $ssi['indirect_os_low_power'] * 0.1, 2) }}
                                                    @elseif ($ssi['indirect_os_low_power'] == null)
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.1 + $ssi['indirect_os_context'] * 0.1, 2) }}
                                                    @else
                                                        {{ round(($ssi['rp'] * 0.3 + $ssi['pd'] * 0.3 + $ssi['os'] * 0.3 + $direct_af * 0.1) * 0.8 + $ssi['indirect_os_subject'] * 0.1 + $ssi['indirect_os_context'] * 0.075 + $ssi['indirect_os_low_power'] * 0.025, 2) }}
                                                    @endif
                                                </h5>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($ssi)
                            <div class="col text-center mb-3">
                                <a class="btn btn-danger"
                                    href="{{ route('ssi.show', [
                                        'detail',
                                        'function_id' => request()->query('function_id'),
                                        'wilker_id' => request()->query('wilker_id'),
                                        'satker_id' => request()->query('satker_id'),
                                        'bidang_id' => request()->query('bidang_id'),
                                        'af' => request()->query('af'),
                                    ]) }}">Detail</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <section id="multiple-column-form">

                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <h3 class="pt-5">
                                <center>Kano</center>
                            </h3>
                            <div class="card-content">
                                <div class="card-body">
                                    <center>
                                        <h5 class="card-text">
                                            @if ($kano == null)
                                                Tidak Ada Data
                                            @elseif(!$kano->count())
                                                Tidak Ada Data
                                            @endif
                                        </h5>
                                    </center>
                                    @if (session('success'))
                                        <div>{{ session('success') }}</div>
                                    @endif
                                    <div class="col-12">
                                        <h6 class="text-center">Penting</h6>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-1">
                                            <h6 class="text-center">Tidak Puas</h6>
                                        </div>
                                        <div class="col-10">
                                            <canvas id="quadrantChart"></canvas>
                                        </div>
                                        <div class="col-1">
                                            <h6 class="text-center">Puas</h6>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h6 class="text-center">Tidak Penting</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section card">
                <h3 class="pt-5">
                    <center>IPA</center>
                </h3>
                <div class="row" id="basic-table">
                    @if ($ipa != null)
                        @if (!$ipa->count())
                            <div class="col-12 mx-auto col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <center>
                                                <h4 class="card-title">Tidak Ada Data</h4>
                                            </center>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($ipa as $ipa)
                                <div class="col-md-4 col-12 mx-auto">
                                    <div class="card custom-card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">Attribute: {{ $ipa->attribute }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-bold-500">Dimensi: {{ $ipa->dimensi }}
                                                                </td>
                                                                <td>Score: {{ $ipa->score }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <div class="col-12 mx-auto">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <center>
                                            <h4 class="card-title">Tidak Ada Data</h4>
                                        </center>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <section class="section card">
                <h3 class="pt-5">
                    <center>Rekomendasi</center>
                </h3>
                <div class="row" id="basic-table">
                    @if ($analisis != null)
                        @if (!$analisis->count())
                            <div class="col-12 mx-auto col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <center>
                                                <h4 class="card-title">Tidak Ada Data</h4>
                                            </center>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($analisis as $analisis)
                                <div class="col-md-4 col-12 mx-auto">
                                    <div class="card custom-card">
                                        <div class="card-content">
                                            <div class="card-body">

                                                <div class="fs-6 text">Saran: {{ $analisis->saran }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <div class="col-12 mx-auto">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <center>
                                            <h4 class="card-title">Tidak Ada Data</h4>
                                        </center>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        @endsection

        @section('scripts')
            <script>
                function clearFilter() {
                    document.getElementById('function_id').value = '';
                    document.getElementById('satker_id').value = '';
                    document.getElementById('wilker_id').value = '';
                    document.getElementById('af').value = '';

                    const functionDropdownBtn = document.getElementById('functionDropdownBtn');
                    functionDropdownBtn.textContent = 'Fungsi';
                    const bidangDropdownBtn = document.getElementById('bidangDropdownBtn');
                    bidangDropdownBtn.textContent = 'Bidang';
                    bidangDropdownBtn.disabled = true;
                    const satkerDropdownBtn = document.getElementById('satkerDropdownBtn');
                    satkerDropdownBtn.textContent = 'Satuan Kerja';
                    satkerDropdownBtn.disabled = true;
                    const wilkerDropdownBtn = document.getElementById('wilkerDropdownBtn');
                    wilkerDropdownBtn.textContent = 'Wilayah Kerja';
                    wilkerDropdownBtn.disabled = true;
                    const afDropdownBtn = document.getElementById('afDropdownBtn');
                    afDropdownBtn.textContent = 'AF';

                }

                function selectFunction(element) {
                    selectDropdownItem(element, 'function_id');

                    // Ensure `data-value` exists
                    const functionId = element.getAttribute('data-value');
                    document.getElementById('function_id').value = functionId;

                    // Access elements and update
                    const typeDropdownBtn = document.getElementById('bidangDropdownBtn');
                    typeDropdownBtn.disabled = false; // Enable typeDropdownBtn when function is selected

                    // Reset fields
                    document.getElementById('bidang_id').value = '';
                    document.getElementById('satker_id').value = '';
                    document.getElementById('wilker_id').value = '';

                    // Reset dropdown text
                    bidangDropdownBtn.textContent = 'Bidang';
                    const satkerDropdownBtn = document.getElementById('satkerDropdownBtn');
                    satkerDropdownBtn.textContent = 'Satker';
                    const wilerDropdownBtn = document.getElementById('wilkerDropdownBtn');
                    wilkerDropdownBtn.textContent = 'Wilayah Kerja';

                    // Disable subsequent dropdowns initially
                    // bidangDropdownBtn.disabled = true;
                    satkerDropdownBtn.disabled = true;
                    wilkerDropdownBtn.disabled = true;

                    // Call fetchTypes with the selected functionId
                    fetchBidang(functionId);
                }

                function fetchBidang(typeId) {
                    console.log('im clicked');
                    fetch(`/api/bidang/${typeId}`)
                        .then(response => response.json())
                        .then(data => {
                            const bidangDropdownList = document.getElementById('bidangDropdownList');
                            bidangDropdownList.innerHTML = ''; // Clear existing options

                            data.forEach(type => {
                                const li = document.createElement('li');
                                li.setAttribute('data-value', type.id);
                                li.onclick = function() {
                                    selectBidang(this);
                                };
                                li.textContent = type.bidang;
                                bidangDropdownList.appendChild(li);
                            });
                        })
                        .catch(error => console.error('Error fetching types:', error));
                }

                function selectBidang(element) {
                    console.log('Anang Ganteng');
                    selectDropdownItem(element, 'bidang_id')
                    const bidangId = element.getAttribute('data-value');
                    document.getElementById('bidang_id').value = bidangId;

                    const bidangDropdownBtn = document.getElementById('satkerDropdownBtn');
                    bidangDropdownBtn.disabled = false;

                    // Reset fields
                    document.getElementById('satker_id').value = '';

                    const satkerDropdownBtn = document.getElementById('satkerDropdownBtn');
                    satkerDropdownBtn.textContent = 'Satker';

                    fetchSatker(bidangId);
                }

                function fetchSatker(bidangId) {
                    // Make an AJAX request to fetch types based on the selected function
                    fetch(`/api/satker/${bidangId}`)
                        .then(response => response.json())
                        .then(data => {
                            const bidangDropdownList = document.getElementById('satkerDropdownList');
                            bidangDropdownList.innerHTML = ''; // Clear existing options
                            data.forEach(type => {
                                const li = document.createElement('li');
                                li.setAttribute('data-value', type.id);
                                li.onclick = function() {
                                    selectSatker(this, 'satker_id');
                                };
                                li.textContent = type.satker;
                                bidangDropdownList.appendChild(li);
                            });
                        })
                        .catch(error => console.error('Error fetching types:', error));
                }

                function selectBebas(element) {
                    console.log(element);
                }

                function selectSatker(element) {
                    selectDropdownItem(element, 'satker_id');
                    const satkerId = element.getAttribute('data-value');
                    document.getElementById('satker_id').value = satkerId;

                    const wilkerDropdownBtn = document.getElementById('wilkerDropdownBtn');
                    wilkerDropdownBtn.disabled = false;

                    // Reset fields
                    document.getElementById('wilker_id').value = '';

                    wilkerDropdownBtn.textContent = 'Wilayah Kerja';

                    fetchWilker(satkerId);
                }

                function fetchWilker(satkerId) {
                    fetch(`/api/wilker/${satkerId}`)
                        .then(response => response.json())
                        .then(data => {
                            const wilkerDropdownList = document.getElementById('wilkerDropdownList');
                            wilkerDropdownList.innerHTML = ''; // Clear existing options
                            data.forEach(wilker => {
                                const li = document.createElement('li');
                                li.setAttribute('data-value', wilker.id);
                                li.onclick = function() {
                                    selectDropdownItem(this, 'wilker_id');
                                };
                                li.textContent = wilker.wilker;
                                wilkerDropdownList.appendChild(li);
                            });
                        })
                        .catch(error => console.error('Error fetching wilayah kerja:', error));
                }

            </script>

            <script>
                function submit() {
                    const button = document.getElementById('submit');

                    button.click();
                }
            </script>
            <script>
                // Data dari Controller
                const chartData = @json($kano);

                function getRandomColor() {
                    const r = Math.floor(Math.random() * 255);
                    const g = Math.floor(Math.random() * 255);
                    const b = Math.floor(Math.random() * 255);
                    return `rgba(${r}, ${g}, ${b}, 0.8)`; // Transparansi 0.8
                }

                // Tambahkan warna random ke setiap titik dalam data
                const dataWithColors = chartData.map(point => ({
                    ...point,
                    backgroundColor: getRandomColor()
                }));

                const ctx = document.getElementById('quadrantChart').getContext('2d');
                new Chart(ctx, {
                    type: 'scatter',
                    data: {
                        datasets: [{
                            label: 'lalala',
                            data: dataWithColors,
                            pointBackgroundColor: dataWithColors.map(point => point.backgroundColor),
                            radius: 15,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                min: 1,
                                max: 6,
                                title: {
                                    display: false,
                                    text: 'Tingkat Kepuasan (X-Axis)'
                                },
                                grid: {
                                    drawBorder: false,
                                    color: function(context) {
                                        return context.tick.value === 3.5 ? '#000000' : '#ddd'; // Midline in red
                                    },
                                    lineWidth: function(context) {
                                        return context.tick.value === 3.5 ? 2 : 1; // Highlight the midline
                                    }
                                }
                            },
                            y: {
                                min: 1,
                                max: 6,
                                title: {
                                    display: false,
                                    text: 'Tingkat Kepentingan (Y-Axis)'
                                },
                                grid: {
                                    drawBorder: false,
                                    color: function(context) {
                                        return context.tick.value === 3.5 ? '#000000' : '#ddd'; // Midline in red
                                    },
                                    lineWidth: function(context) {
                                        return context.tick.value === 3.5 ? 2 : 1; // Highlight the midline
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false // Hilangkan legend dari chart
                            },
                            tooltip: {
                                backgroundColor: '#BCCCDC', // Warna background tooltip
                                titleColor: '#000000', // Warna judul
                                bodyColor: '#000000', // Warna isi teks
                                borderColor: '#00BFFF',
                                titleFont: {
                                    size: 16,
                                    weight: 'bold'
                                }, // Styling font title
                                bodyFont: {
                                    size: 14
                                }, // Styling font body
                                padding: 12, // Padding dalam tooltip
                                cornerRadius: 8, // Sudut melengkung tooltip
                                callbacks: {
                                    label: function(context) {
                                        const dataPoint = context.raw;
                                        return [
                                            `Nama Attribute          : ${dataPoint.label}`,
                                            `Tingkat Kepentingan : ${dataPoint.y}`,
                                            `Tingkat Kepuasan     : ${dataPoint.x}`
                                        ];
                                    }
                                }
                            }
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }
                    }
                });
            </script>

            <script>
                function toggleDropdown(dropdownId) {
                    const dropdown = document.getElementById(dropdownId);
                    dropdown.classList.toggle('active');
                }

                function filterDropdown(input) {
                    const filter = input.value.toLowerCase();
                    const items = input.nextElementSibling.querySelectorAll('li');
                    items.forEach(item => {
                        const text = item.textContent || item.innerText;
                        item.style.display = text.toLowerCase().includes(filter) ? '' : 'none';
                    });
                }

                function selectDropdownItem(item, hiddenInputId) {
                    const dropdown = item.closest('.dropdown-content');
                    const button = dropdown.previousElementSibling;
                    const hiddenInput = document.getElementById(hiddenInputId);

                    button.textContent = item.textContent;
                    hiddenInput.value = item.getAttribute('data-value');
                    dropdown.classList.remove('active');
                }

                document.addEventListener('click', function(e) {
                    const dropdowns = document.querySelectorAll('.dropdown-content');
                    dropdowns.forEach(dropdown => {
                        if (!dropdown.contains(e.target) && !dropdown.previousElementSibling.contains(e.target)) {
                            dropdown.classList.remove('active');
                        }
                    });
                });
            </script>
        @endsection

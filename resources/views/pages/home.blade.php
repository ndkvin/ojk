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
@endsection

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @auth
            @if (auth()->user()->role == 'user')
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                Tunggu Admin Verifikasi Data Anda
                            </h5>
                        </div>
                    </div>
                </section>
            @endif
        @endauth
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
                                                <label for="type_id" class="form-label">Tipe</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button"  id="typeDropdownBtn" class="dropdown-btn"
                                                            onclick="toggleDropdown('typeDropdown')">
                                                            {{ request()->get('type_id') ? $types->where('id', request()->get('type_id'))->first()->type : 'Tipe' }}
                                                        </button>
                                                        <div class="dropdown-content" id="typeDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list" id="typeDropdownList">
                                                                @foreach ($types as $type)
                                                                    <li data-value="{{ $type->id }}"
                                                                        onclick="selectType(this)">
                                                                        {{ $type->type }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="type_id"
                                                        value="{{ request()->get('type_id') ? $types->where('id', request()->get('type_id'))->first()->id : '' }}"
                                                        name="type_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="bidang_id" class="form-label">Bidang</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn" id="bidangDropdownBtn"
                                                            onclick="toggleDropdown('bidangDropdown')">
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
                                                            onclick="toggleDropdown('satkerDropdown')">
                                                            {{ request()->get('satker_id') ? $satkers->where('id', request()->get('satker_id'))->first()->satker : 'Satker' }}
                                                        </button>
                                                        <div class="dropdown-content" id="satkerDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list" id="satkerDropdownList">
                                                                @foreach ($satkers as $satker)
                                                                    <li data-value="{{ $satker->id }}"
                                                                        onclick="selectDropdownItem(this, 'satker_id')">
                                                                        {{ $satker->satker }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden"
                                                        value="{{ request()->get('satker_id') ? $satkers->where('id', request()->get('satker_id'))->first()->id : '' }}"
                                                        id="satker_id" name="satker_id" required>
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
                                                                    Confirmation Factor 1 Open Question
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
                                            <div class="w-100 btn btn-secondary"
                                                style="margin-top:10px" onclick="clearFilter()">Clear</div>
                                            <button type="submit" class="w-100 btn btn-danger"
                                                style="margin-top:10px">Filter</button>
                                        </div>
                                        {{-- <button type="submit" class="d-none" id="submit"></button> --}}
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
                                                                $direct_af = $ssi->af_1_oq;
                                                                $indirect_af = $ssi->indirect_af_1_oq;
                                                            } elseif (request()->query('af') == 'af_2_oq') {
                                                                $direct_af = $ssi->af_2_oq;
                                                                $indirect_af = $ssi->indirect_af_2_oq;
                                                            } elseif (request()->query('af') == 'cf_1_oq') {
                                                                $direct_af = $ssi->cf_1_oq;
                                                                $indirect_af = $ssi->indirect_cf_1_oq;
                                                            } elseif (request()->query('af') == 'cf_2_oq') {
                                                                $direct_af = $ssi->cf_2_oq;
                                                                $indirect_af = $ssi->indirect_cf_2_oq;
                                                            }
                                                        }
                                                    @endphp
                                                    <h5 class="card-text">
                                                        {{ $ssi == null ? 'Tidak Ada Data' : $ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $direct_af * 0.1 }}
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
                                                        {{ $ssi == null ? 'Tidak Ada Data' : $ssi->indirect_os * 0.9 + $indirect_af * 0.1 }}
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
                                                    {{ $ssi == null ? 'Tidak Ada Data' : ($ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $direct_af * 0.1) * 0.8 + ($ssi->indirect_os * 0.9 + $indirect_af * 0.1) * 0.2 }}
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
                                    href="{{ route('ssi.show', [$ssi->id, request()->query('af')]) }}">Detail</a>
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
                                    <div>
                                        <canvas id="quadrantChart"></canvas>
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
        @endsection

        @section('scripts')
            <script>
                function clearFilter() {
                    document.getElementById('function_id').value = '';
                    document.getElementById('type_id').value = '';
                    document.getElementById('bidang_id').value = '';
                    document.getElementById('satker_id').value = '';
                    document.getElementById('af').value = '';

                    const functionDropdownBtn = document.getElementById('functionDropdownBtn');
                    functionDropdownBtn.textContent = 'Fungsi';
                    const typeDropdownBtn = document.getElementById('typeDropdownBtn');
                    typeDropdownBtn.textContent = 'Tipe';
                    const bidangDropdownBtn = document.getElementById('bidangDropdownBtn');
                    bidangDropdownBtn.textContent = 'Bidang';
                    const satkerDropdownBtn = document.getElementById('satkerDropdownBtn');
                    satkerDropdownBtn.textContent = 'Satker';
                    const afDropdownBtn = document.getElementById('afDropdownBtn');
                    afDropdownBtn.textContent = 'AF';

                }

                function selectFunction(element) {
                    selectDropdownItem(element, 'function_id')
                    const functionId = element.getAttribute('data-value');
                    document.getElementById('function_id').value = functionId;

                    const typeDropdownBtn = document.getElementById('typeDropdownBtn');
                    typeDropdownBtn.disabled = false;

                    fetchTypes(functionId);
                }

                function fetchTypes(functionId) {
                    // Make an AJAX request to fetch types based on the selected function
                    fetch(`/api/type/${functionId}`)
                        .then(response => response.json())
                        .then(data => {
                            const typeDropdownList = document.getElementById('typeDropdownList');
                            typeDropdownList.innerHTML = ''; // Clear existing options

                            data.forEach(type => {
                                const li = document.createElement('li');
                                li.setAttribute('data-value', type.id);
                                li.onclick = function() {
                                    selectType(this);
                                };
                                li.textContent = type.type;
                                typeDropdownList.appendChild(li);
                            });
                        })
                        .catch(error => console.error('Error fetching types:', error));
                }

                function selectType(element) {
                    selectDropdownItem(element, 'type_id')
                    const typeId = element.getAttribute('data-value');
                    document.getElementById('type_id').value = typeId;

                    const bidangDropdownBtn = document.getElementById('bidangDropdownBtn');
                    bidangDropdownBtn.disabled = false;

                    fetchBidang(typeId);
                }

                function fetchBidang(typeId) {
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
                    selectDropdownItem(element, 'bidang_id')
                    const bidangId = element.getAttribute('data-value');
                    document.getElementById('type_id').value = bidangId;

                    const bidangDropdownBtn = document.getElementById('satkerDropdownBtn');
                    bidangDropdownBtn.disabled = false;

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
                                    selectDropdownItem(this, 'satker_id');
                                };
                                li.textContent = type.satker;
                                bidangDropdownList.appendChild(li);
                            });
                        })
                        .catch(error => console.error('Error fetching types:', error));
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
                                min: 0,
                                max: 6,
                                title: {
                                    display: true,
                                    text: 'Tingkat Kepuasan (X-Axis)'
                                },
                                grid: {
                                    drawBorder: false,
                                    color: function(context) {
                                        return context.tick.value === 0 ? '#000' : '#ddd';
                                    }
                                }
                            },
                            y: {
                                min: 0,
                                max: 6,
                                title: {
                                    display: true,
                                    text: 'Tingkat Kepentingan (Y-Axis)'
                                },
                                grid: {
                                    drawBorder: false,
                                    color: function(context) {
                                        return context.tick.value === 0 ? '#000' : '#ddd';
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
                                boxShadow: '0px 4px 6px rgba(0, 0, 0, 0)', // Bayangan (custom CSS)
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

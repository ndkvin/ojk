@extends('layouts.dashboard')

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
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="function_id" class="form-label">Fungsi</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            onclick="toggleDropdown('functionDropdown')">
                                                            Pilih Fungsi
                                                        </button>
                                                        <div class="dropdown-content" id="functionDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list">
                                                                @foreach ($functions as $function)
                                                                    <li data-value="{{ $function->id }}"
                                                                        onclick="selectDropdownItem(this, 'function_id')">
                                                                        {{ $function->function }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="function_id" name="function_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="type_id" class="form-label">Tipe</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            onclick="toggleDropdown('typeDropdown')">
                                                            Pilih Tipe
                                                        </button>
                                                        <div class="dropdown-content" id="typeDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list">
                                                                @foreach ($types as $type)
                                                                    <li data-value="{{ $type->id }}"
                                                                        onclick="selectDropdownItem(this, 'type_id')">
                                                                        {{ $type->type }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="type_id" name="type_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="bidang_id" class="form-label">Bidang</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            onclick="toggleDropdown('bidangDropdown')">
                                                            Pilih Bidang
                                                        </button>
                                                        <div class="dropdown-content" id="bidangDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list">
                                                                @foreach ($bidangs as $bidang)
                                                                    <li data-value="{{ $bidang->id }}"
                                                                        onclick="selectDropdownItem(this, 'bidang_id')">
                                                                        {{ $bidang->bidang }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="bidang_id" name="bidang_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="satker_id" class="form-label">Satuan Kerja</label>
                                                <div class="dropdown-container">
                                                    <div class="dropdown">
                                                        <button type="button" class="dropdown-btn"
                                                            onclick="toggleDropdown('satkerDropdown')">
                                                            Pilih Satuan Kerja
                                                        </button>
                                                        <div class="dropdown-content" id="satkerDropdown">
                                                            <input type="text" class="dropdown-search"
                                                                placeholder="Search..." oninput="filterDropdown(this)">
                                                            <ul class="dropdown-list">
                                                                @foreach ($satkers as $satker)
                                                                    <li data-value="{{ $satker->id }}"
                                                                        onclick="selectDropdownItem(this, 'satker_id')">
                                                                        {{ $satker->satker }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="satker_id" name="satker_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_af" class="form-label">Jenis AF</label>
                                            <div class="dropdown-container">
                                                <div class="dropdown">
                                                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('jenisAfDropdown')">
                                                        Pilih Jenis AF
                                                    </button>
                                                    <div class="dropdown-content" id="jenisAfDropdown">
                                                        <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                                                        <ul class="dropdown-list">
                                                            <li data-value="af_1_oq" onclick="selectDropdownItem(this, 'jenis_af')">
                                                                Adjusment Factor 1 Open Question
                                                            </li>
                                                            <li data-value="af_2_oq" onclick="selectDropdownItem(this, 'jenis_af')">
                                                                Adjusment Factor 2 Open Question
                                                            </li>
                                                            <li data-value="cf_1_oq" onclick="selectDropdownItem(this, 'jenis_af')">
                                                                Confirmation Factor 1 Open Question
                                                            </li>
                                                            <li data-value="cf_2_oq" onclick="selectDropdownItem(this, 'jenis_af')">
                                                                Confirmation Factor 2 Open Question
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="jenis_af" name="jenis_af" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="d-none" id="submit"></button>
                                    </div>
                                </form>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" onclick="submit()"
                                        class="btn btn-primary me-1 mb-1">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>SSI</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="card" style="border: 2px solid red">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <center>
                                                    <h4 class="card-title">Direct Score</h4>
                                                </center>
                                                <center>
                                                    <h5 class="card-text">
                                                        @if ($ssi == null)
                                                            Tidak Ada Data
                                                        @elseif ($jenis_af == 'af_1_oq')
                                                            {{ $ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->af_1_oq * 0.1 }}
                                                        @elseif ($jenis_af == 'af_2_oq')
                                                            {{ $ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->af_2_oq * 0.1 }}
                                                        @elseif ($jenis_af == 'cf_1_oq')
                                                            {{ $ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->cf_1_oq * 0.1 }}
                                                        @elseif ($jenis_af == 'cf_2_oq')
                                                            {{ $ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->cf_2_oq * 0.1 }}
                                                        @else
                                                            {{ 'Jenis AF tidak valid' }}
                                                        @endif
                                                    </h5>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card" style="border: 2px solid red">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <center>
                                                    <h4 class="card-title">Indirect Score</h4>
                                                </center>
                                                <center>
                                                    <h5 class="card-text">
                                                        @if ($ssi == null)
                                                            Tidak Ada Data
                                                        @elseif ($jenis_af == 'af_1_oq')
                                                            {{ $ssi->indirect_os * 0.9 + $ssi->indirect_af_1_oq * 0.1 }}
                                                        @elseif ($jenis_af == 'af_2_oq')
                                                            {{ $ssi->indirect_os * 0.9 + $ssi->indirect_af_2_oq * 0.1 }}
                                                        @elseif ($jenis_af == 'cf_1_oq')
                                                            {{ $ssi->indirect_os * 0.9 + $ssi->indirect_cf_1_oq * 0.1 }}
                                                        @elseif ($jenis_af == 'cf_2_oq')
                                                            {{ $ssi->indirect_os * 0.9 + $ssi->indirect_cf_2_oq * 0.1 }}
                                                        @else
                                                            {{ 'Jenis AF tidak valid' }}
                                                        @endif
                                                    </h5>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-auto col-md-8 col-12">
                                    <div class="card" style="border: 3px solid red">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <center>
                                                    <h4 class="card-title">Total</h4>
                                                </center>
                                                <center>
                                                    <h5 class="card-text">
                                                        @if ($ssi == null)
                                                            Tidak Ada Data
                                                        @elseif ($jenis_af == 'af_1_oq')
                                                            {{ ($ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->af_1_oq * 0.1) * 0.8 + ($ssi->indirect_os * 0.9 + $ssi->indirect_af_1_oq * 0.1) * 0.2 }}
                                                        @elseif ($jenis_af == 'af_2_oq')
                                                            {{ ($ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->af_2_oq * 0.1) * 0.8 + ($ssi->indirect_os * 0.9 + $ssi->indirect_af_2_oq * 0.1) * 0.2 }}
                                                        @elseif ($jenis_af == 'cf_1_oq')
                                                            {{ ($ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->cf_1_oq * 0.1) * 0.8 + ($ssi->indirect_os * 0.9 + $ssi->indirect_cf_1_oq * 0.1) * 0.2 }}
                                                        @elseif ($jenis_af == 'cf_2_oq')
                                                            {{ ($ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->cf_2_oq * 0.1) * 0.8 + ($ssi->indirect_os * 0.9 + $ssi->indirect_cf_2_oq * 0.1) * 0.2 }}
                                                        @else
                                                            {{ 'Jenis AF tidak valid' }}
                                                        @endif
                                                    </h5>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center mb-3">
                        <a class="btn btn-primary" href="{{ route('ssi.show', $ssi->id) }}">Detail</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="multiple-column-form">
            <h3>
                <center>Kano</center>
            </h3>
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-text">
                                        {{ $kano == null ? 'Tidak Ada Data' : ($ssi->rp * 0.3 + $ssi->pd * 0.3 + $ssi->os * 0.3 + $ssi->af * 0.1) * 0.6 + ($ssi->indirect_os * 0.9 + $ssi->indirect_af * 0.1) * 0.4 }}
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
    @endsection

    @section('scripts')
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
                        label: '',
                        data: dataWithColors,
                        pointBackgroundColor: dataWithColors.map(point => point.backgroundColor),
                        radius: 10,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            min: -6,
                            max: 6,
                            title: {
                                display: true,
                                text: 'Puas (X-Axis)'
                            },
                            grid: {
                                drawBorder: true,
                                color: function(context) {
                                    return context.tick.value === 0 ? '#000' : '#ddd';
                                }
                            }
                        },
                        y: {
                            min: -6,
                            max: 6,
                            title: {
                                display: true,
                                text: 'Penting (Y-Axis)'
                            },
                            grid: {
                                drawBorder: true,
                                color: function(context) {
                                    return context.tick.value === 0 ? '#000' : '#ddd';
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)', // Warna background tooltip
                            titleColor: '#ffffff', // Warna judul
                            bodyColor: '#ffffff', // Warna isi teks
                            titleFont: {
                                size: 16,
                                weight: 'bold'
                            }, // Styling font title
                            bodyFont: {
                                size: 14
                            }, // Styling font body
                            padding: 12, // Padding dalam tooltip
                            cornerRadius: 8, // Sudut melengkung tooltip
                            boxShadow: '0px 4px 6px rgba(0, 0, 0, 0.3)', // Bayangan (custom CSS)
                            callbacks: {
                                label: function(context) {
                                    const dataPoint = context.raw;
                                    return [
                                        `Attribute: ${dataPoint.label}`,
                                        `Penting: ${dataPoint.y}`,
                                        `Puas: ${dataPoint.x}`
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

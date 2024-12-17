@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Create Data</h1>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('fungsionalitas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
    <label for="function_id" class="form-label">Fungsi</label>
    <div class="dropdown-container">
        <div class="dropdown">
            <button type="button" class="dropdown-btn" onclick="toggleDropdown('functionDropdown')">
                Pilih Fungsi
            </button>
            <div class="dropdown-content" id="functionDropdown">
                <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                <ul class="dropdown-list">
                    @foreach ($functions as $function)
                        <li data-value="{{ $function->id }}" onclick="selectFunction(this)">
                            {{ $function->function }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <input type="hidden" id="function_id" name="function_id" required>
    </div>
</div>

<div class="mb-3">
    <label for="type_id" class="form-label">Tipe</label>
    <div class="dropdown-container">
        <div class="dropdown">
            <button type="button" class="dropdown-btn" id="typeDropdownBtn" onclick="toggleDropdown('typeDropdown')" disabled>
                Pilih Tipe
            </button>
            <div class="dropdown-content" id="typeDropdown">
                <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                <ul class="dropdown-list" id="typeDropdownList">
                    <!-- Types will be populated here based on selected function -->
                </ul>
            </div>
        </div>
        <input type="hidden" id="type_id" name="type_id" required>
    </div>
</div>

<div class="mb-3">
    <label for="type_id" class="form-label">Bidang</label>
    <div class="dropdown-container">
        <div class="dropdown">
            <button type="button" class="dropdown-btn" id="bidangDropdownBtn" onclick="toggleDropdown('bidangDropdown')" disabled>
                Pilih Bidang
            </button>
            <div class="dropdown-content" id="bidangDropdown">
                <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                <ul class="dropdown-list" id="bidangDropdownList">
                    <!-- Types will be populated here based on selected function -->
                </ul>
            </div>
        </div>
        <input type="hidden" id="bidang_id" name="bidang_id" required>
    </div>
</div>

<div class="mb-3">
    <label for="type_id" class="form-label">Satuan Kerja</label>
    <div class="dropdown-container">
        <div class="dropdown">
            <button type="button" class="dropdown-btn" id="satkerDropdownBtn" onclick="toggleDropdown('satkerDropdown')" disabled>
                Pilih Satuan Kerja
            </button>
            <div class="dropdown-content" id="satkerDropdown">
                <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                <ul class="dropdown-list" id="satkerDropdownList">
                    <!-- Types will be populated here based on selected function -->
                </ul>
            </div>
        </div>
        <input type="hidden" id="satker_id" name="satker_id" required>
    </div>
</div>
                        {{-- <div class="mb-3">
                            <label for="function_id" class="form-label">Fungsi</label>
                            <div class="dropdown-container">
                                <div class="dropdown">
                                    <button type="button" class="dropdown-btn"
                                        onclick="toggleDropdown('functionDropdown')">
                                        Pilih Fungsi
                                    </button>
                                    <div class="dropdown-content" id="functionDropdown">
                                        <input type="text" class="dropdown-search" placeholder="Search..."
                                            oninput="filterDropdown(this)">
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
                        </div> --}}
{{-- 
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Tipe</label>
                            <div class="dropdown-container">
                                <div class="dropdown">
                                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('typeDropdown')">
                                        Pilih Tipe
                                    </button>
                                    <div class="dropdown-content" id="typeDropdown">
                                        <input type="text" class="dropdown-search" placeholder="Search..."
                                            oninput="filterDropdown(this)">
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
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="bidang_id" class="form-label">Bidang</label>
                            <div class="dropdown-container">
                                <div class="dropdown">
                                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('bidangDropdown')">
                                        Pilih Bidang
                                    </button>
                                    <div class="dropdown-content" id="bidangDropdown">
                                        <input type="text" class="dropdown-search" placeholder="Search..."
                                            oninput="filterDropdown(this)">
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
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="satker_id" class="form-label">Satuan Kerja</label>
                            <div class="dropdown-container">
                                <div class="dropdown">
                                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('satkerDropdown')">
                                        Pilih Satuan Kerja
                                    </button>
                                    <div class="dropdown-content" id="satkerDropdown">
                                        <input type="text" class="dropdown-search" placeholder="Search..."
                                            oninput="filterDropdown(this)">
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
                        </div> --}}


                        <button type="submit" class="btn btn-primary">Isi Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#satker_id').on('change', function() {
            console.log('123321')
        });
    </script>

    <script>
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
                        li.onclick = function() { selectType(this); };
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

            const typeDropdownBtn = document.getElementById('bidangDropdownBtn');
            bidangDropdownBtn.disabled = false;

            fetchBidang(typeId);
        }

        function fetchBidang(typeId) {
            // Make an AJAX request to fetch types based on the selected function
            fetch(`/api/bidang/${typeId}`)
                .then(response => response.json())
                .then(data => {
                    const bidangDropdownList = document.getElementById('bidangDropdownList');
                    bidangDropdownList.innerHTML = ''; // Clear existing options

                    data.forEach(bidang => {
                        const li = document.createElement('li');
                        li.setAttribute('data-value', bidang.id);
                        li.onclick = function() { selectBidang(this); };
                        li.textContent = bidang.bidang;
                        bidangDropdownList.appendChild(li);
                    });
                })
                .catch(error => console.error('Error fetching types:', error));
        }

        function selectBidang(element) {
            selectDropdownItem(element, 'bidang_id')
            const bidangId = element.getAttribute('data-value');
            document.getElementById('bidang_id').value = bidangId;

            const bidangDropdownBtn = document.getElementById('satkerDropdownBtn');
            satkerDropdownBtn.disabled = false;

            fetchSatker(bidangId);
        }

        function fetchSatker(bidangId) {
            // Make an AJAX request to fetch types based on the selected function
            fetch(`/api/satker/${bidangId}`)
                .then(response => response.json())
                .then(data => {
                    const satkerDropdownList = document.getElementById('satkerDropdownList');
                    satkerDropdownList.innerHTML = ''; // Clear existing options

                    data.forEach(satker => {
                        console.log(satker);
                        const li = document.createElement('li');
                        li.setAttribute('data-value', satker.id);
                        li.onclick = function() { selectDropdownItem(this, 'satker_id'); };
                        li.textContent = satker.satker;
                        satkerDropdownList.appendChild(li);
                    });
                })
                .catch(error => console.error('Error fetching types:', error));
        }

    </script>
@endsection

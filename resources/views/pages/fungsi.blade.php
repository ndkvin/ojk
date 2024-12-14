@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Create Transaction</h1>
    <form action="{{ route('fungsionalitas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="function_id" class="form-label">Function</label>
            <div class="dropdown-container">
                <div class="dropdown">
                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('functionDropdown')">
                        Select Function
                    </button>
                    <div class="dropdown-content" id="functionDropdown">
                        <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                        <ul class="dropdown-list">
                            @foreach($functions as $function)
                                <li data-value="{{ $function->id }}" onclick="selectDropdownItem(this, 'function_id')">
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
            <label for="type_id" class="form-label">Type</label>
            <div class="dropdown-container">
                <div class="dropdown">
                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('typeDropdown')">
                        Select Type
                    </button>
                    <div class="dropdown-content" id="typeDropdown">
                        <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                        <ul class="dropdown-list">
                            @foreach($types as $type)
                                <li data-value="{{ $type->id }}" onclick="selectDropdownItem(this, 'type_id')">
                                    {{ $type->type }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <input type="hidden" id="type_id" name="type_id" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="satker_id" class="form-label">Satker</label>
            <div class="dropdown-container">
                <div class="dropdown">
                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('satkerDropdown')">
                        Select Satker
                    </button>
                    <div class="dropdown-content" id="satkerDropdown">
                        <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                        <ul class="dropdown-list">
                            @foreach($satkers as $satker)
                                <li data-value="{{ $satker->id }}" onclick="selectDropdownItem(this, 'satker_id')">
                                    {{ $satker->satker }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <input type="hidden" id="satker_id" name="satker_id" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="bidang_id" class="form-label">Bidang</label>
            <div class="dropdown-container">
                <div class="dropdown">
                    <button type="button" class="dropdown-btn" onclick="toggleDropdown('bidangDropdown')">
                        Select Bidang
                    </button>
                    <div class="dropdown-content" id="bidangDropdown">
                        <input type="text" class="dropdown-search" placeholder="Search..." oninput="filterDropdown(this)">
                        <ul class="dropdown-list">
                            @foreach($bidangs as $bidang)
                                <li data-value="{{ $bidang->id }}" onclick="selectDropdownItem(this, 'bidang_id')">
                                    {{ $bidang->bidang }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <input type="hidden" id="bidang_id" name="bidang_id" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

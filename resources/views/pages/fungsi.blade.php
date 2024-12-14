@extends('layouts.dashboard')

@section('title', 'DDashboard')

@section('content')
<div class="container">
    <h1>Create Transaction</h1>
    <form action="{{ route('fungsionalitas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="function_id" class="form-label">Function</label>
            <select class="form-select" id="function_id" name="function_id" required>
                <option value="" disabled selected>Select Function</option>
                @foreach($functions as $function)
                    <option value="{{ $function->id }}">{{ $function->function }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select" id="type_id" name="type_id" required>
                <option value="" disabled selected>Select Type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="satker_id" class="form-label">Satker</label>
            <select class="form-select" id="satker_id" name="satker_id" required>
                <option value="" disabled selected>Select Satker</option>
                @foreach($satkers as $satker)
                    <option value="{{ $satker->id }}">{{ $satker->satker }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bidang_id" class="form-label">Bidang</label>
            <select class="form-select" id="bidang_id" name="bidang_id" required>
                <option value="" disabled selected>Select Bidang</option>
                @foreach($bidangs as $bidang)
                    <option value="{{ $bidang->id }}">{{ $bidang->bidang }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

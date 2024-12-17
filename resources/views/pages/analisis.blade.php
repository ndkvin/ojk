@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Analisis</h3>
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
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ $analisis == null ? route('analisis.store') : route('analisis.update',1 ) }}" method="POST">
                                @if ($analisis != null)
                                    @method('PUT')
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="af-1-oq">Kritik</label>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="af-2-oq">Saran</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="form-rows">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="kritik" rows="3" placeholder="Kritik" required>{{ $analisis == null ? '': $analisis->kritik }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">

                                            <textarea class="form-control" name="saran" rows="3" placeholder="Saran" required>{{ $analisis == null ? '' : $analisis->saran }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name='function_id' value="{{ request()->query('function_id') }}">
                                <input type="hidden" name='type_id' value="{{ request()->query('type_id') }}">
                                <input type="hidden" name='satker_id' value="{{ request()->query('satker_id') }}">
                                <input type="hidden" name='bidang_id' value="{{ request()->query('bidang_id') }}">
                                <button type="submit" class="d-none" id="submit"></button>
                            </form>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" onclick="submit()" class="btn btn-primary me-1 mb-1">Simpan</button>
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

@endsection

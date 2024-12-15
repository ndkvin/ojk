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
                            <form class="form" action="{{ route('analisis.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="af-1-oq">AF 1 OQ</label>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="af-2-oq">AF 2 OQ</label>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="cf-1-oq">CF 1 OQ</label>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="cf-1-oq">CF 2 OQ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="form-rows">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="af_1_oq" rows="3" placeholder="AF 1 OQ" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">

                                            <textarea class="form-control" name="af_2_oq" rows="3" placeholder="AF 2 OQ" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">

                                            <textarea class="form-control" name="cf_1_oq" rows="3" placeholder="CF 1 OQ" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="cf_2_oq" rows="3" placeholder="CF 2 OQ" required></textarea>
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

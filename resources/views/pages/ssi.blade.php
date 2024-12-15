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
                            <form class="form" action="{{ route('ssi.store') }}" method="POST">
                                @csrf
                                <section id="basic-form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Internal</h4>
                                                </div>
                                                <div class="card-content" style="padding-top:-50px ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-3 mb-1">
                                                                <div class="form-group mb-3">
                                                                    <label for="rp">RP</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="RP" aria-label="RP"
                                                                        aria-describedby="rp" name='rp'  required step="0.0000000001">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-1">
                                                                <div class="form-group mb-3">
                                                                    <label for="pb">PB</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="PB" aria-label="PB"
                                                                        aria-describedby="pb" name='pb'  required step="0.0000000001">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-1">
                                                                <div class="form-group mb-3">
                                                                    <label for="os">OS</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="OS" aria-label="OS"
                                                                        aria-describedby="os" name='os'  required step="0.0000000001">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-1">
                                                                <div class="form-group mb-3">
                                                                    <label for="af">AF</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="AF" aria-label="AF"
                                                                        aria-describedby="af" name='af'  required step="0.0000000001">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Eksternal</h4>
                                                </div>
                                                <div class="card-content" style="padding-top:-50px ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-1">
                                                                <div class="form-group mb-3">
                                                                    <label for="or">OR</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="OR" aria-label="OR"
                                                                        aria-describedby="or" name='or'  required step="0.0000000001">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-1">
                                                                <div class="form-group mb-3">
                                                                    <label for="as">AS</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="AS" aria-label="AS"
                                                                        aria-describedby="as" name='as'  required step="0.0000000001">

                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <input type="hidden" name='function_id' value="{{ request()->query('function_id') }}">
                                <input type="hidden" name='type_id' value="{{ request()->query('type_id') }}">
                                <input type="hidden" name='satker_id' value="{{ request()->query('satker_id') }}">
                                <input type="hidden" name='bidang_id' value="{{ request()->query('bidang_id') }}">
                                <button type="submit" class="d-none" id="submit"></button>
                            </form>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" onclick="submit()"
                                    class="btn btn-primary me-1 mb-1">Simpan</button>
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

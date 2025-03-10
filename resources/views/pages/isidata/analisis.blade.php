@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Rekomendasi</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Rekomendasi</a></li>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="af-2-oq">Rekomendasi</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="form-rows">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="saran" rows="3" placeholder="Saran" required>{{ $analisis == null ? '' : $analisis->saran }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name='function_id' value="{{ request()->query('function_id') }}">
                                <!-- <input type="hidden" name='type_id' value="{{ request()->query('type_id') }}"> -->
                                <input type="hidden" name='satker_id' value="{{ request()->query('satker_id') }}">
                                <input type="hidden" name='bidang_id' value="{{ request()->query('bidang_id') }}">
                                <button type="submit" class="d-none" id="submit"></button>
                            </form>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" onclick="submit()" class="btn btn-danger me-1 mb-1">Simpan</button>
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

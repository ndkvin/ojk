@extends('layouts.dashboard')

@section('title', 'Form Data KANO')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data KANO</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">KANO</a></li>
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
                            <form class="form" action="{{ route('kano.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="attribute">Attribute</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="puas">Tingkat Kepuasan</label>

                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="penting">Tingkat Kepentingan</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="form-rows">
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="attribute[]" type="text" placeholder="Nama Attribute" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">

                                            <input class="form-control" name="puas[]" type="number" max="5" min="-5" step="0.1" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="penting[]" type="number" max="5" min="-5" step="0.1" required></input>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name='function_id' value="{{ request()->query('function_id') }}">
                                <input type="hidden" name='type_id' value="{{ request()->query('type_id') }}">
                                <input type="hidden" name='satker_id' value="{{ request()->query('satker_id') }}">
                                <input type="hidden" name='bidang_id' value="{{ request()->query('bidang_id') }}">
                                <button type="submit" class="d-none" id="submit"></button>
                            </form>
                            <div class="col-12 d-flex justify-content-between">
                                <button id='add-row-btn' class="btn btn-light-secondary me-1 mb-1">Tambah Baris</button>
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

        document.getElementById('add-row-btn').addEventListener('click', function() {
            // Container untuk semua row form
            const formRows = document.getElementById('form-rows');

            // HTML untuk baris baru
            const newRow = `
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <input class="form-control" name="attribute[]" type="text" placeholder="Nama Attribute" required></input>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="form-group">
                        <input class="form-control" name="puas[]" type="number" max="5" min="-5" step="0.1" required></input>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="form-group">
                        <input class="form-control" name="penting[]" type="number" max="5" min="-5" step="0.1" required></input>
                    </div>
                </div>`;

            // Tambahkan row baru ke dalam form
            formRows.insertAdjacentHTML('beforeend', newRow);
        });
    </script>

@endsection

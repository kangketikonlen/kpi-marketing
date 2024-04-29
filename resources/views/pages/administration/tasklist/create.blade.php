@php
    $html_tag_data = [];
    $title = 'Formulir Penugasan';
    $description = 'Create Penugasan';
    $url = '/administration/tasklist';
    $breadcrumbs = ['/' => 'Home', $url => 'View Penugasan'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/administration/tasklist.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        @include('_layout/breadcrumb')
        <!-- Title End -->

        <!-- Form Start -->
        <form method="POST" action="{{ $url }}/store" class="card mb-5 tooltip-end-top">
            @csrf
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="description">
                                Deskripsi
                                @error('description')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" id="description" name="description">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="indicator">
                                Indikator
                                @error('indicator')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="indicator" name="indicator">
                                <option></option>
                                <option value="Sales">Sales</option>
                                <option value="Report">Report</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="employee_id">
                                Karyawan
                                @error('employee_id')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="employee_id" name="employee_id"></select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="deadline">
                                Tanggal Deadline
                                @error('deadline')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="date" class="form-control" autocomplete="off" id="deadline" name="deadline">
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="actual_date">
                                Tanggal Aktual
                                @error('actual_date')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="date" class="form-control" autocomplete="off" id="actual_date"
                                name="actual_date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end pt-3 pb-3">
                <x-buttons.submit />
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection

@php
    $html_tag_data = [];
    $title = 'Formulir Bobot KPI';
    $description = 'Create Bobot KPI';
    $url = '/setting/indicator-weight';
    $breadcrumbs = ['/' => 'Home', $url => 'View Bobot KPI'];
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
    <script src="/js/pages/setting/indicator-weight.js"></script>
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
                            <label class="form-label" for="type">
                                Indikator
                                @error('type')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="type" name="type">
                                <option></option>
                                <option value="Sales">Sales</option>
                                <option value="Report">Report</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="target">
                                Target
                                @error('target')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="number" class="form-control" autocomplete="off" id="target" name="target">
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="weight_percentage">
                                Bobot KPI (%)
                                @error('weight_percentage')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="number" class="form-control" autocomplete="off" id="weight_percentage"
                                name="weight_percentage">
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="late_percentage">
                                Terlambat (%)
                                @error('late_percentage')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="number" class="form-control" autocomplete="off" id="late_percentage"
                                name="late_percentage">
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

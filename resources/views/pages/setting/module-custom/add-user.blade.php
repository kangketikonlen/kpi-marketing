@php
    $html_tag_data = [];
    $title = 'Formulir Custom Module';
    $description = 'Create Custom Module';
    $url = '/setting/custom-module/' . $moduleCustom->id;
    $breadcrumbs = ['/' => 'Home', $url => 'View Custom Module'];
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
    <script src="/js/pages/setting/module-custom.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        @include('_layout/breadcrumb')
        <!-- Title End -->

        <!-- Form Start -->
        <form method="POST" action="{{ $url }}/store-user" class="card mb-5 tooltip-end-top">
            @csrf
            @method('PUT')
            <div class="card-header pt-2 pb-2">
                <h4 class="m-0">Tambah User ke {{ strtoupper($moduleCustom->description) }}</h4>
            </div>
            <div class="card-body pt-2 pb-2">
                <div class="alert alert-info">
                    <strong>Informasi</strong>, silahkan isi fakultas dan program studi jika ingin membuat jabatan lebih
                    spesifik. Silahkan kosongkan jika ingin membuat jabatan secara global.
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="user_id">
                                Pengguna
                                @error('user_id')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="user_id" name="user_id[]"
                                multiple></select>
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

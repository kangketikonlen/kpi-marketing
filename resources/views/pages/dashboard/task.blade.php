@php
    $html_tag_data = [];
    $title = 'Dashboard ' . session('module_name');
    $description = 'Dashboard';
    $breadcrumbs = ['/' => 'Home'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        @include('_layout/breadcrumb')
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h4 class="fw-bold">Hi, {{ session()->get('name') }}</h4>
                <p class="m-0">
                    Selamat datang di dashboard {{ session('module_name') }}.
                </p>
            </div>
        </div>
    </div>
@endsection

@php
    $html_tag_data = [];
    $title = 'Superadmin Dashboard';
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
        <div class="row justify-content-center">
            <div class="col-4">
                @include('pages.dashboard.components.profile')
            </div>
            <div class="col-8">
                <div class="row g-4 justify-content-center">
                    <div class="col-12">
                        @include('pages.dashboard.components.main-module')
                    </div>
                    @if (!$moduleCustomUsers->isEmpty())
                        <div class="col-12">
                            @include('pages.dashboard.components.additional-module')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

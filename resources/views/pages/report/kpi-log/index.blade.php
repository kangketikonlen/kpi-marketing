@php
    $html_tag_data = [];
    $title = 'Data Report KPI';
    $description = 'View Report KPI';
    $url = '/report/kpi-log';
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
        <!-- Title and Top Buttons Start -->
        @include('_layout/breadcrumb')
        <!-- Title and Top Buttons End -->

        <!-- Item List Start -->
        @include('pages.report.kpi-log.components.sales-card')
        @include('pages.report.kpi-log.components.report-card')
        <!-- Item List End -->
    </div>
@endsection
